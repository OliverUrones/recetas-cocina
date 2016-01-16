<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * RecetaComentarios Controller
 *
 * @property \App\Model\Table\RecetaComentariosTable $RecetaComentarios */
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
    public function add($idreceta=null)
    {
		$usuario= $this->request->session()->read('Auth.User');
        $recetaComentario = $this->RecetaComentarios->newEntity();
        if ($this->request->is('post')) {
            $recetaComentario = $this->RecetaComentarios->patchEntity($recetaComentario, $this->request->data);
			$recetaComentario->receta_id=$idreceta;
			$recetaComentario->usuario_id=$usuario['id'];
            if ($this->RecetaComentarios->save($recetaComentario)) {
                $this->Flash->success(__('el comentario se guardo.'));
                return $this->redirect(['controller' => 'recetas', 'action' => 'fichadetallada',$idreceta]);
            } else {
                $this->Flash->error(__('el comentario no se pudo guardar.'));
            }
        }
       $this->set(compact('recetaComentario', 'idreceta'));
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
            'contain' => ['Recetas', 'Usuarios']
        ]);
		$idreceta=$recetaComentario->receta->id;
		
       
        if ($this->request->is(['patch', 'post', 'put'])) {
			 $recetaComentario = $this->RecetaComentarios->patchEntity($recetaComentario, $this->request->data);
            if ($this->RecetaComentarios->save($recetaComentario)) {
                $this->Flash->success(__('El comentario se guardo.'));
                return $this->redirect(['controller' => 'recetas', 'action' => 'fichadetallada',$idreceta]);
            } else {
                $this->Flash->error(__('el comentario no pudo ser guardado.'));
            }
        }
 
      $this->set(compact('recetaComentario', 'idreceta'));
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
		$idreceta=$recetaComentario->receta_id;
        if ($this->RecetaComentarios->delete($recetaComentario)) {
            $this->Flash->success(__('Se borro el comentario.'));
        } else {
            $this->Flash->error(__('el comentario no pudo ser borrado.'));
        }
            return $this->redirect(['controller' => 'recetas', 'action' => 'fichadetallada',$idreceta]);
    }
}
