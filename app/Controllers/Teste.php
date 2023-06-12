<?php

namespace App\Controllers;

use App\Libraries\S3;
use App\Models\ClientModel;
use App\Models\EmpresaClienteModel;
use App\Models\EmpresaModel;
use Aws\S3\S3Client;
use Aws\S3\Exception\S3Exception;

use Config\Aws;


class Teste extends BaseController
{
    public function index()
    {
        $request = service('request');

        $instanceId = file_get_contents("http://169.254.169.254/latest/meta-data/instance-id");
        $publicIp = file_get_contents("http://169.254.169.254/latest/meta-data/public-ipv4");
        $instanceName = file_get_contents("http://169.254.169.254/latest/meta-data/hostname");

        echo "ID da Instância: " . $instanceId . "<br>";
        echo "Endereço IP Público: " . $publicIp . "<br>";
        echo "Nome da Instância: " . $instanceName . "<br>";
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
        $mCliente   = new ClientModel();
        $mEmpresa   = new EmpresaModel();
        $mRelaciona = new EmpresaClienteModel();

        $rows = $mCliente->findAll();

        $mRelaciona->purgeDeleted();

        $clientes = $mCliente->select('empresa_cliente.name, empresa_cliente.id, empresa_cliente.email, empresa.id id_empresa')
            ->join('empresa_relaciona_cliente relaciona', 'relaciona.id_cliente = empresa_cliente.id')
            ->join('empresa', 'empresa.id = relaciona.id_empresa')
            ->where('empresa.id', 4)
            ->where('empresa_cliente.deleted_at IS NULL')
            ->orderBy('empresa_cliente.id', 'ASC')
            ->findAll();


        echo "<h1>" . count($clientes) . "</h1>";
        //echo "<pre>";
        echo "<table border='2' style='width: 60%;'>";
        echo   "<tr>";
            echo "<th>Empresa</th>";
            echo "<th>Id</th>";
            echo "<th>Nome</th>";
            echo "<th>Email</th>";
        echo "</tr>";
        foreach ($clientes as $cliente) {
            echo "<tr>";
                echo '<td>' . $cliente['id_empresa'] . '</td>';
                echo '<td>' . $cliente['id'] . '</td>';
                echo '<td>' . $cliente['name'] . '</td>';
                echo '<td>' . $cliente['email'] . '</td>';
            echo '</tr>';
        }
        echo "</table>";
    }

    public function mostrar0()
    {
        $image = new S3();

        echo '<img src="' . $image->getImageUrl("clients/644fcec825933.jpg") . '" style="width: 300px;"/>';
        echo '<img src="' . $image->getImageUrl("clients/644fcf201d804.png") . '" style="width: 300px;"/>';
    }
}
