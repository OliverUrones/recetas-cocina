<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * RecetaCategorias Controller
 *
 * @property \App\Model\Table\RecetaCategoriasTable $RecetaCategorias */
class RecetaCategoriasController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Recetas', 'Categorias']
        ];
        $this->set('recetaCategorias', $this->paginate($this->RecetaCategorias));
        $this->set('_serialize', ['recetaCategorias']);
    }

    /**
     * View method
     *
     * @param string|null $id Receta Categoria id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $recetaCategoria = $this->RecetaCategorias->get($id, [
            'contain' => ['Recetas', 'Categorias']
        ]);
        $this->set('recetaCategoria', $recetaCategoria);
        $this->set('_serialize', ['recetaCategoria']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $recetaCategoria = $this->RecetaCategorias->newEntity();
        if ($this->request->is('post')) {
            $recetaCategoria = $this->RecetaCategorias->patchEntity($recetaCategoria, $this->request->data);
            if ($this->RecetaCategorias->save($recetaCategoria)) {
                $this->Flash->success(__('The receta categoria has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The receta categoria could not be saved. Please, try again.'));
            }
        }
        $recetas = $this->RecetaCategorias->Recetas->find('list', ['limit' => 200]);
        $categorias = $this->RecetaCategorias->Categorias->find('list', ['limit' => 200]);
        $this->set(compact('recetaCategoria', 'recetas', 'categorias'));
        $this->set('_serialize', ['recetaCategoria']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Receta Categoria id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $recetaCategoria = $this->RecetaCategorias->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $recetaCategoria = $this->RecetaCategorias->patchEntity($recetaCategoria, $this->request->data);
            if ($this->RecetaCategorias->save($recetaCategoria)) {
                $this->Flash->success(__('The receta categoria has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The receta categoria could not be saved. Please, try again.'));
            }
        }
        $recetas = $this->RecetaCategorias->Recetas->find('list', ['limit' => 200]);
        $categorias = $this->RecetaCategorias->Categorias->find('list', ['limit' => 200]);
        $this->set(compact('recetaCategoria', 'recetas', 'categorias'));
        $this->set('_serialize', ['recetaCategoria']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Receta Categoria id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $recetaCategoria = $this->RecetaCategorias->get($id);
        if ($this->RecetaCategorias->delete($recetaCategoria)) {
            $this->Flash->success(__('The receta categoria has been deleted.'));
        } else {
            $this->Flash->error(__('The receta categoria could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
