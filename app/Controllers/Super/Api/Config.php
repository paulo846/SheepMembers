<?php

namespace App\Controllers\Super\Api;

use App\Libraries\S3;
use App\Models\ConfigModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;

class Config extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    private $mConfig;
    private $s3;
    public  $request;

    public function __construct()
    {
        $this->request = service('request');
        $this->s3      = new S3();
        $this->mConfig = new ConfigModel();

        helper('url');
    }

    use ResponseTrait;

    public function index()
    {
        //
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        //
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        //
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        //
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null, $tipo = null)
    {
        //
        if ($search = $this->mConfig->select('id')->where('id_empresa', $id)->find()) {
            try {

                $input = $this->request->getPost();

                if($tipo == 'analytics'){
                    $data = [
                        'id' => $search[0]['id'],
                        'analytics' => $input['analytics']
                    ];
                }

                if($tipo == 'alertas'){
                    $data = [
                        'id' => $search[0]['id'],
                        'alertas' => $input['alertas']
                    ];
                }

                if ($tipo == 'dominio') {
                    $data = [
                        'id' => $search[0]['id'],
                        'slug' => $input['dominio']
                    ];
                }

                if ($tipo == 'ptbr') {
                    $data = [
                        'id' => $search[0]['id'],
                        'title_pt'       => $input['title_pt'],
                        'description_pt' => $input['desc_pt'],
                        'stream_pt'      => convertToEmbedUrl($input['url_pt']),
                    ];
                }

                if ($tipo == 'en') {
                    $data = [
                        'id' => $search[0]['id'],
                        'title_en' => $input['title_en'],
                        'description_en' => $input['desc_en'],
                        'stream_en' => convertToEmbedUrl($input['url_en']),
                    ];
                }

                if ($tipo == 'es') {
                    $data = [
                        'id' => $search[0]['id'],
                        'title_es' => $input['title_es'],
                        'description_es' => $input['desc_es'],
                        'stream_es' => convertToEmbedUrl($input['url_es']),
                    ];
                }

                if ($tipo == 'images') {

                    $logo       = $this->request->getFile('logo');
                    $data['id'] = $search[0]['id'];
                    if ($logo) {
                        $nLogo = $this->s3->uploadImage($logo, "{$id}/logo");
                        $data['logo_pt'] = $nLogo;
                    }

                    $background = $this->request->getFile('background');
                    if ($background) {
                        $nBack = $this->s3->uploadImage($background, "{$id}/background");
                        $data['fundo'] = $nBack;
                    }
                }

                $this->mConfig->save($data);

                return $this->respond(['message' => 'Atualizado com sucesso!'], 200);
                
            } catch (\Exception $e) {

                return $this->fail($e->getMessage(), 400);
            }
        } else {

            return $this->respond('Erro ao buscar configuração', 200);
        }
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        //
    }
}
