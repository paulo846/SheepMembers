<?php

namespace App\Libraries;

use Aws\S3\S3Client;
use Aws\S3\Exception\S3Exception;
use Aws\Exception\AwsException;
use CodeIgniter\Files\File;
use Intervention\Image\ImageManager;

class S3
{
    private $s3;
    private $awsBucket;
    protected $image;

    public function __construct()
    {
        $this->image = new ImageManager(['driver' => 'gd']);
        $this->awsBucket = getenv('AWS_BUCKET');

        $this->s3 = new S3Client([
            'credentials' => [
                'key'    => getenv('AWS_ACCESS_KEY_ID'),
                'secret' => getenv('AWS_SECRET_ACCESS_KEY')
            ],
            'region' => getenv('AWS_DEFAULT_REGION'),
            'version' => 'latest',
        ]);
    }

    public function uploadImage($file, $uniqueName)
    {
        // Trata a imagem, caso necessário
        $file = $this->handleImage($file);

        // Carrega a imagem para comprimi-la
        $img = $this->image->make($file->getPathname());

        // Comprime a imagem com 10% de qualidade
        $img->encode('png', 10);

        // Define o nome do arquivo no S3
        $fileName = 'clients/' . $uniqueName . '.png'; //. $file->guessExtension();

        // Upload do arquivo para o S3
        try {
            $result = $this->s3->putObject([
                'Bucket' => $this->awsBucket,
                'Key' => $fileName,
                'Body' => $img->stream(),
                'ContentType' => 'image/png',
                'ACL' => 'public-read'
            ]);
        } catch (AwsException $e) {
            throw new \RuntimeException('Ocorreu um erro ao enviar a imagem para o S3: ' . $e->getMessage());
        }

        // Retorna o nome exclusivo do arquivo
        return $fileName;
    }

    public function getImageUrl($fileName, $expiration = 10)
    {
        return $this->s3->getObjectUrl($this->awsBucket, $fileName,  '+' . $expiration . ' seconds');
    }

    public function deleteImage($fileName)
    {
        try {
            $this->s3->deleteObject([
                'Bucket' => $this->awsBucket,
                'Key'    => $fileName
            ]);
            return true;
        } catch (S3Exception $e) {
            echo 'Ocorreu um erro ao excluir a imagem do S3: ' . $e->getMessage();
            return false;
        }
    }


    private function handleImage(File $file)
    {
        // TODO: Adicionar tratamento e redimensionamento de imagem aqui, se necessário

        return $file;
    }
}
