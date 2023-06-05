<?php

namespace App\Controllers\Super\Api;

use App\Libraries\S3;
use App\Models\ConfigModel;
use App\Models\GravacoesModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;
use Exception;

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
    public $mGravacoes;

    public function __construct()
    {
        $this->request    = service('request');
        $this->s3         = new S3();
        $this->mConfig    = new ConfigModel();
        $this->mGravacoes = new GravacoesModel();

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

    public function updateAnalytics()
    {
        $input = $this->request->getPost();

        if ($search = $this->mConfig->select('id')->where('id_empresa', $input['id_empresa'])->find()) {
            try {

                $data = [
                    'id'       => $search[0]['id'],
                    'slug'     =>  $input['slug'],
                    'analytics' => $input['scriptHeader'],
                    'scripts_footer' => $input['scriptFooter']
                ];

                $this->mConfig->save($data);
                return $this->respond($data);
            } catch (\Exception $e) {
                return $this->fail(['err' => $e->getMessage()]);
            }
        } else {
            return $this->fail(['err' => 'Erro ao buscar configuração']);
        }
    }

    public function updateImages()
    {
        $input = $this->request->getPost();

        $favicon    = $this->request->getFile('favicon');
        $logo       = $this->request->getFile('logo');
        $capa       = $this->request->getFile('capa');
        $background = $this->request->getFile('background');


        if ($search = $this->mConfig->select('id')->where('id_empresa', $input['id_empresa'])->find()) {

            $data['id'] = $search[0]['id'];

            try {
                if ($favicon) {
                    $faviconUp = $this->s3->uploadImage($favicon, "{$input['id_empresa']}/favicon32");
                    $data['favicon'] = $faviconUp;
                }

                if ($logo) {
                    $logoUp = $this->s3->uploadImage($logo, "{$input['id_empresa']}/logo");
                    $data['logo'] = $logoUp;
                }

                if ($capa) {
                    $capaUp = $this->s3->uploadImage($capa, "{$input['id_empresa']}/capa");
                    $data['capa'] = $capaUp;
                }

                if ($background) {
                    $backgroundUp = $this->s3->uploadImage($background, "{$input['id_empresa']}/background");
                    $data['background'] = $backgroundUp;
                }

                $this->mConfig->save($data);

                return $this->respond($data);
            } catch (\Exception $e) {
                return $this->fail(['err' => $e->getMessage()]);
            }
        } else {
            return $this->fail(['err' => 'Erro ao buscar configuração']);
        }
    }

    public function traducao(string $tipo)
    {
        try {
            //configurações de idioma para pt br
            if ($tipo == 'ptbr') {
                //recupera dados
                $input = $this->request->getPost();

                //capa pt br
                $capa       = $this->request->getFile('ptcapa');

                //verifica se capa foi enviada
                if ($capa) {
                    //envia capa para o S3
                    $capaUp = $this->s3->uploadImage($capa, "{$input['id_empresa']}/video/capapt");

                    //monta dados para atualizar
                    $data = [
                        'id' => $input['id_config'],
                        'title_pt' => $input['ptTitulo'],
                        'description_pt' => $input['ptDesc'],
                        'stream_pt' => convertToEmbedUrl($input['ptLink']),
                        'logo_pt' =>  $capaUp
                    ];

                    //imagem não enviada
                } else {
                    //dados para atualizar sem atualiza a imagem
                    $data = [
                        'id' => $input['id_config'],
                        'title_pt' => $input['ptTitulo'],
                        'description_pt' => $input['ptDesc'],
                        'stream_pt' => convertToEmbedUrl($input['ptLink'])
                    ];
                }

                //atualiza dados
                $this->mConfig->save($data);

                //atualização para idioma em inglês
            
            
            } elseif ($tipo == 'en') {

                //recupera dados
                $input = $this->request->getPost();

                //capa pt br
                $capa       = $this->request->getFile('enCapa');

                //verifica se capa foi enviada
                if ($capa) {
                    //envia capa para o S3
                    $capaUp = $this->s3->uploadImage($capa, "{$input['id_empresa']}/video/capaen");

                    //monta dados para atualizar
                    $data = [
                        'id' => $input['id_config'],
                        'title_en' => $input['enTitulo'],
                        'description_en' => $input['enDesc'],
                        'stream_en' => convertToEmbedUrl($input['enLink']),
                        'logo_en' =>  $capaUp
                    ];

                    //imagem não enviada
                } else {
                    //dados para atualizar sem atualiza a imagem
                    $data = [
                        'id' => $input['id_config'],
                        'title_en' => $input['enTitulo'],
                        'description_en' => $input['enDesc'],
                        'stream_en' => convertToEmbedUrl($input['enLink'])
                    ];
                }

                //atualiza dados
                $this->mConfig->save($data);

            } elseif ($tipo == 'es') {
                //recupera dados
                $input = $this->request->getPost();

                //capa pt br
                $capa       = $this->request->getFile('esCapa');

                //verifica se capa foi enviada
                if ($capa) {
                    //envia capa para o S3
                    $capaUp = $this->s3->uploadImage($capa, "{$input['id_empresa']}/video/capaes");

                    //monta dados para atualizar
                    $data = [
                        'id' => $input['id_config'],
                        'title_es' => $input['esTitulo'],
                        'description_es' => $input['esDesc'],
                        'stream_es' => convertToEmbedUrl($input['esLink']),
                        'logo_es' =>  $capaUp
                    ];

                    //imagem não enviada
                } else {
                    //dados para atualizar sem atualiza a imagem
                    $data = [
                        'id' => $input['id_config'],
                        'title_es' => $input['esTitulo'],
                        'description_es' => $input['esDesc'],
                        'stream_es' => convertToEmbedUrl($input['esLink'])
                    ];
                }
                //atualiza dados
                $this->mConfig->save($data);
            } else {

                //erro se o idioma não foi definido na url
                throw new Exception('Não autorizado!');
            }

            //MENSAGEM DE SUCESSO
            return $this->respond($data);
        } catch (\Exception $e) {

            //TTO DE ERROS
            return $this->fail(['err' => $e->getMessage()], 403);
        }
    }

    public function gravacao()
    {
        try {

            $input = $this->request->getPost();

            $vertical    = $this->request->getFile('vertical');
            $capaVideo   = $this->request->getFile('capaGravados');
            $capaPagina  = $this->request->getFile('heroGravacao');

            if (!$vertical) {
                throw new Exception('Envie uma imagem vertical!');
            }
            if (!$capaVideo) {
                throw new Exception('Envia uma capa para o video');
            }

            if (!$capaPagina) {
                throw new Exception('Envie uma capa para a página');
            }

            $idTime = time();

            $verticalUp = $this->s3->uploadImage($vertical,   "{$input['id_empresa']}/".$idTime."/img192x270");
            $horizontal = $this->s3->uploadImage($capaVideo,  "{$input['id_empresa']}/".$idTime."/img1280x720");
            $hero       = $this->s3->uploadImage($capaPagina, "{$input['id_empresa']}/".$idTime."/img1920x450");

            $data = [
                'id' => $idTime,
                'id_empresa' => $input['id_empresa'],
                'id_carrossel' => $input['id_carrossel'],
                'title' => $input['title'],
                'description' => $input['descricao'],
                'url' => convertToEmbedUrl($input['url']),
                'horizontal' => $horizontal,
                'vertical' => $verticalUp,
                'hero' => $hero,
                'comentarios' => $input['ativaComentarios'],
                'slug' => slugGravacao($input['title'])
            ];

            $this->mGravacoes->insert($data);

            return $this->respond($data);
        } catch (\Exception $e) {
            return $this->fail(['err' => $e->getMessage()]);
        }
    }

    public function update($id = null, $tipo = null)
    {
        //
        if ($search = $this->mConfig->select('id')->where('id_empresa', $id)->find()) {
            try {

                $input = $this->request->getPost();

                if ($tipo == 'analytics') {
                    $data = [
                        'id' => $search[0]['id'],
                        'analytics' => $input['analytics']
                    ];
                }

                if ($tipo == 'alertas') {
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
                        //$nLogo = $this->s3->uploadImage($logo, "{$id}/logo");
                        //$data['logo_pt'] = $nLogo;
                    }

                    $background = $this->request->getFile('background');
                    if ($background) {
                        //$nBack = $this->s3->uploadImage($background, "{$id}/background");
                        //$data['fundo'] = $nBack;
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
