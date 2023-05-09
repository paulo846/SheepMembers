<?php

namespace App\Controllers;

use App\Libraries\S3;
use App\Models\ClientModel;
use Aws\S3\S3Client;
use Aws\S3\Exception\S3Exception;

use Config\Aws;


class Teste extends BaseController
{
    public function index()
    {

        // use the factory to create a Faker\Generator instance
        /*$faker = \Faker\Factory::create();

        $data = array();

        for ($i=0; $i < 7000; $i++) { 
            $data[] = [
                'name' => $faker->name,
                'email' => $faker->email,
                'phone' => $faker->phoneNumber,
                'password' => 'mudar123',//password_hash('mudar123', PASSWORD_BCRYPT),
                'token' => uniqid() 
            ]; 
        }

        $user = new ClientModel();

        $user->insertBatch($data);
        echo "<pre>";
        print_r($data);*/

    }
    public function upload()
    {
        $image = new S3();

        $file = $this->request->getFile('imagem');

        try {
            return $image->uploadImage($file, uniqid());
        } catch (\Exception $e) {
            echo "<pre>";
            print_r($e->getMessage());
        }
    }
    public function upload1()
    {

        /* $image = $this->request->getFile('imagem');
        $awsConfig = new Aws();

        $s3 = new S3Client([
            'credentials' => $awsConfig->credentials,
            'region'      => $awsConfig->region,
            'version'     => 'latest',
        ]);


        try {

            $result = $s3->putObject([
                'Bucket' => $awsConfig->bucket,
                'Key'    => '12/' . $image->getName(),
                'Body'   => fopen($image->getPathname(), 'r'),
                'ACL'    => 'private',
                //'ACL'    => 'public-read',
            ]);

            echo 'A imagem foi enviada para o S3 com sucesso!';
        } catch (S3Exception $e) {

            echo 'Ocorreu um erro ao enviar a imagem para o S3: 
            <pre>' . $e->getMessage() . '</pre>';
        }*/
    }


    public function mostrar()
    {
        $image = new S3();

        echo '<img src="' . $image->getImageUrl("clients/644fcec825933.jpg") . '" style="width: 300px;"/>';
        echo '<img src="' . $image->getImageUrl("clients/644fcf201d804.png") . '" style="width: 300px;"/>';
    }
}
