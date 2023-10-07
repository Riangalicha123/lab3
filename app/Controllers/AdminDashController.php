<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class AdminDashController extends BaseController
{
    private $fruits;

    function __construct()
    {
        $this->fruits = new UserModel();
    }

    public function index()
    {
        $data = [
            'activePage' => 'Dashboard',
            'products' => $this->fruits->findAll()
        ]; 
        return view('index', $data);
    }

    public function viewProducts()
    {
        $data = [
            'activePage' => 'Products',
            'products' => $this->fruits->findAll()
        ]; 
        return view('index', $data);
        
    }

    public function addProduct(){
        $file = $this->request->getFile('image');
        
        $newFileName = $file->getRandomName();

        $data = [
            'fruitName' => $this->request->getVar('fruitName'),
            'fruitDescription' => $this->request->getVar('fruitDescription'),
            'fruitPrice' => $this->request->getVar('fruitPrice'),
            'fruitQuantity' => $this->request->getVar('fruitQuantity'),
            'image' => $newFileName
        ];

        $rules = [
            'image' => [
                'uploaded[image]',
                'max_size[image,10240]', 
                'ext_in[image,png,jpg,gif]'
            ]
        ];
        if($this->validate($rules)){
            if($file->isValid() && !$file->hasMoved()){
                if($file->move(FCPATH.'uploads/', $newFileName)){
                    $this->fruits->save($data);
                }else{
                    echo $file->getErrorString().' '.$file->getError();
                }
            }
        }else{
            $data['validation'] = $this->validator;
        }

        return redirect()->to('/products');
    }

    public function deleteProd($id = null){
        $this->fruits->delete($id);
        return redirect()->to('/products');
    }

    public function editProd($id = null){
        $data = [
            'activePage' => 'Products',
            'selectedProduct' => $this->fruits->where('fruitID', $id)->first()
        ];
        return view('editProd',$data);
    }

    public function updateProd(){

        $data = [
            'fruitID' => $this->request->getVar('fruitID'),
            'fruitName' => $this->request->getVar('fruitName'),
            'fruitDescription' => $this->request->getVar('fruitDescription'),
            'fruitPrice' => $this->request->getVar('fruitPrice'),
            'fruitQuantity' => $this->request->getVar('fruitQuantity')
        ];
        var_dump($data);
        $this->fruits->set($data)->where('fruitID',$data['fruitID'])->update();
        return redirect()->to('/products');
    }
}
