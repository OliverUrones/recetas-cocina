<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * RecetaPasos Controller
 *
 * @property \App\Model\Table\RecetaPasosTable $RecetaPasos
 */
class RecetaPasosController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Recetas']
        ];
        $this->set('recetaPasos', $this->paginate($this->RecetaPasos));
        $this->set('_serialize', ['recetaPasos']);
    }

    /**
     * View method
     *
     * @param string|null $id Receta Paso id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $recetaPaso = $this->RecetaPasos->get($id, [
            'contain' => ['Recetas', 'RecetaPasoImagenes']
        ]);
        $this->set('recetaPaso', $recetaPaso);
        $this->set('_serialize', ['recetaPaso']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $recetaPaso = $this->RecetaPasos->newEntity();
        if ($this->request->is('post')) {
            $recetaPaso = $this->RecetaPasos->patchEntity($recetaPaso, $this->request->data);
            if ($this->RecetaPasos->save($recetaPaso)) {
                $this->Flash->success(__('The receta paso has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The receta paso could not be saved. Please, try again.'));
            }
        }
        $recetas = $this->RecetaPasos->Recetas->find('list', ['limit' => 200]);
        $this->set(compact('recetaPaso', 'recetas'));
        $this->set('_serialize', ['recetaPaso']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Receta Paso id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $recetaPaso = $this->RecetaPasos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $recetaPaso = $this->RecetaPasos->patchEntity($recetaPaso, $this->request->data);
            if ($this->RecetaPasos->save($recetaPaso)) {
                $this->Flash->success(__('The receta paso has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The receta paso could not be saved. Please, try again.'));
            }
        }
        $recetas = $this->RecetaPasos->Recetas->find('list', ['limit' => 200]);
        $this->set(compact('recetaPaso', 'recetas'));
        $this->set('_serialize', ['recetaPaso']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Receta Paso id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $recetaPaso = $this->RecetaPasos->get($id);
        if ($this->RecetaPasos->delete($recetaPaso)) {
            $this->Flash->success(__('The receta paso has been deleted.'));
        } else {
            $this->Flash->error(__('The receta paso could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
