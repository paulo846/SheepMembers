<?php

namespace App\Controllers\Super\Api;

use App\Models\CarrosselModel;
use App\Models\ConfigModel;
use App\Models\EmpresaModel;
use CodeIgniter\API\ResponseTrait;
use CodeIgniter\RESTful\ResourceController;
use Exception;

class Empresas extends ResourceController
{
    private $mEmpresa;
    public  $request;

    public function __construct()
    {
        $request = service('resquest');

        $this->mEmpresa = new EmpresaModel();

        helper('url');
    }
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
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
        try {

            $input = $this->request->getPost();
            $data = [
                'name' => $input['nome'],
                'empresa' => $input['empresa']
            ];

            $id = $this->mEmpresa->insert($data);

            $mConfig = new ConfigModel();

            if (!$mConfig->where('id_empresa', $id)->countAllResults()) {
                $dataConfig = [
                    'id_empresa' => $id
                ];
                $idConfig = $mConfig->insert($dataConfig);
            }

            return $this->respondCreated(['id' => $idConfig]);
        } catch (\Exception $e) {

            return $this->fail($e->getMessage(), 400);
        }
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        $input = $this->request->getPost();

        try {
            $data = [
                'id' => $input['id_empresa'],
                //'bloqueio' => $input[''],
                'prazo' =>  $input['prazo'],
                'name' =>  $input['empresaResponsavel'],
                'empresa' =>  $input['empresaNome'],
                'valor' =>  formatar_valor_monetario($input['valorContrato']),
                'contrato' =>  $input['content'],
                'evento' =>  $input['nomeEvento']
            ];

            $this->mEmpresa->save($data);

            return $this->respond(['msg' => 'Atualizado com sucesso'], 200);
        } catch (\Exception $e) {
            return $this->fail($e->getMessage(), 400);
        }
    }


    public function update0($id = null)
    {
        //
        if ($id) {

            try {
                $input = $this->request->getPost();
                $data = [
                    'name'     => $input['nome'],
                    'empresa'  => $input['empresa'],
                    'valor'    => formatar_valor_monetario($input['valor']),
                    'contrato' => $input['contrato']
                ];
                $this->mEmpresa->update($id, $data);

                return $this->respond(['message' => 'Atualizado com sucesso'], 200);
            } catch (\Exception $e) {

                return $this->fail($e->getMessage(), 400);
            }
        } else {
            return $this->fail('id is required');
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

    public function carrossel()
    {
        $input = $this->request->getPost();
        $mCarrossel = new CarrosselModel();
        try {
            $data = [
                'id_empresa' => $input['id_empresa'],
                'title' => $input['title'],
                'config' => $input['config']
            ];

            $mCarrossel->insert($data);

            return $this->respond(['msg' => 'Criado com sucesso!']);
        } catch (\Exception $e) {

            return $this->fail(['err' => $e->getMessage()]);
        }
    }

    public function addaviso()
    {
        try {
            
            $input = $this->request->getPost();
            
            $data = [
                'id' => $input['id_config'],
                'alertas' => $input['avisoPlataforma']
            ];

            $mConfig = new ConfigModel();

            $mConfig->save($data);
            
            return $this->respond($data);

        } catch (\Exception $e) {
            
            return $this->fail(['err' => $e->getMessage()]);
        
        }
    }
}
