<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * RecetaComentarios Controller
 *
 * @property \App\Model\Table\RecetaComentariosTable $RecetaComentarios
 */
class RecetaComentariosController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Recetas', 'Usuarios']
        ];
        $this->set('recetaComentarios', $this->paginate($this->RecetaComentarios));
        $this->set('_serialize', ['recetaComentarios']);
    }

    /**
     * View method
     *
     * @param string|null $id Receta Comentario id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $recetaComentario = $this->RecetaComentarios->get($id, [
            'contain' => ['Recetas', 'Usuarios']
        ]);
        $this->set('recetaComentario', $recetaComentario);
        $this->set('_serialize', ['recetaComentario']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $recetaComentario = $this->RecetaComentarios->newEntity();
        if ($this->request->is('post')) {
            $recetaComentario = $this->RecetaComentarios->patchEntity($recetaComentario, $this->request->data);
            if ($this->RecetaComentarios->save($recetaComentario)) {
                $this->Flash->success(__('The receta comentario has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The receta comentario could not be saved. Please, try again.'));
            }
        }
        $recetas = $this->RecetaComentarios->Recetas->find('list', ['limit' => 200]);
        $usuarios = $this->RecetaComentarios->Usuarios->find('list', ['limit' => 200]);
        $this->set(compact('recetaComentario', 'recetas', 'usuarios'));
        $this->set('_serialize', ['recetaComentario']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Receta Comentario id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $recetaComentario = $this->RecetaComentarios->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $recetaComentario = $this->RecetaComentarios->patchEntity($recetaComentario, $this->request->data);
            if ($this->RecetaComentarios->save($recetaComentario)) {
                $this->Flash->success(__('The receta comentario has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The receta comentario could not be saved. Please, try again.'));
            }
        }
        $recetas = $this->RecetaComentarios->Recetas->find('list', ['limit' => 200]);
        $usuarios = $this->RecetaComentarios->Usuarios->find('list', ['limit' => 200]);
        $this->set(compact('recetaComentario', 'recetas', 'usuarios'));
        $this->set('_serialize', ['recetaComentario']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Receta Comentario id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $recetaComentario = $this->RecetaComentarios->get($id);
        if ($this->RecetaComentarios->delete($recetaComentario)) {
            $this->Flash->success(__('The receta comentario has been deleted.'));
        } else {
            $this->Flash->error(__('The receta comentario could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
