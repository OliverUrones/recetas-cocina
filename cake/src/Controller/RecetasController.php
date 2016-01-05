<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Recetas Controller
 *
 * @property \App\Model\Table\RecetasTable $Recetas
 */
class RecetasController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Usuarios']
        ];
        $this->set('recetas', $this->paginate($this->Recetas));
        $this->set('_serialize', ['recetas']);
    }

    /**
     * View method
     *
     * @param string|null $id Receta id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $receta = $this->Recetas->get($id, [
            'contain' => ['Usuarios', 'MenuPlatos', 'RecetaCategorias', 'RecetaComentarios', 'RecetaIngredientes', 'RecetaPasos']
        ]);
        $this->set('receta', $receta);
        $this->set('_serialize', ['receta']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $receta = $this->Recetas->newEntity();
        if ($this->request->is('post')) {
            $receta = $this->Recetas->patchEntity($receta, $this->request->data);
            if ($this->Recetas->save($receta)) {
                $this->Flash->success(__('The receta has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The receta could not be saved. Please, try again.'));
            }
        }
        $usuarios = $this->Recetas->Usuarios->find('list', ['limit' => 200]);
        $this->set(compact('receta', 'usuarios'));
        $this->set('_serialize', ['receta']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Receta id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $receta = $this->Recetas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $receta = $this->Recetas->patchEntity($receta, $this->request->data);
            if ($this->Recetas->save($receta)) {
                $this->Flash->success(__('La receta ha sido guardada.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The receta could not be saved. Please, try again.'));
            }
        }
        $usuarios = $this->Recetas->Usuarios->find('list', ['limit' => 200]);
        $this->set(compact('receta', 'usuarios'));
        $this->set('_serialize', ['receta']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Receta id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $receta = $this->Recetas->get($id);
        if ($this->Recetas->delete($receta)) {
            $this->Flash->success(__('La receta ha sido eliminada.'));
        } else {
            $this->Flash->error(__('The receta could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
