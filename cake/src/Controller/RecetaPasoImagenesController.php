<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * RecetaPasoImagenes Controller
 *
 * @property \App\Model\Table\RecetaPasoImagenesTable $RecetaPasoImagenes
 */
class RecetaPasoImagenesController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index($recetaPaso_id=null)
    {
        $this->paginate = [
            'contain' => ['RecetaPasos']
        ];
        if($recetaPaso_id == null){
            $recetaPaso_id = $_GET['recetaPaso_id'];
        }
        $recetaPasoImagenes= $this->paginate($this->RecetaPasoImagenes);
        $this->set(compact('recetaPasoImagenes','recetaPaso_id'));
        $this->set('_serialize', ['recetaPasoImagenes']);
    }

    /**
     * View method
     *
     * @param string|null $id Receta Paso Imagene id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $recetaPasoImagene = $this->RecetaPasoImagenes->get($id, [
            'contain' => ['RecetaPasos']
        ]);
        $this->set('recetaPasoImagene', $recetaPasoImagene);
        $this->set('_serialize', ['recetaPasoImagene']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add($recetaPaso_id=null)
    {
        $recetaPasoImagene = $this->RecetaPasoImagenes->newEntity();
        if ($this->request->is('post')) {
            $recetaPasoImagene = $this->RecetaPasoImagenes->patchEntity($recetaPasoImagene, $this->request->data);
            $paso = $this->RecetaPasoImagenes->RecetaPasos->get($recetaPaso_id);
			$recetaPasoImagene->receta_paso=$paso;
            if ($this->RecetaPasoImagenes->save($recetaPasoImagene)) {
                $this->Flash->success(__('The receta paso imagene has been saved.'));
                return $this->redirect(['action' => 'index',$recetaPaso_id]);
            } else {
                $this->Flash->error(__('The receta paso imagene could not be saved. Please, try again.'));
            }
        }
         $this->set(compact('recetaPasoImagene', 'recetaPaso_id'));
        $this->set('_serialize', ['recetaPasoImagene']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Receta Paso Imagene id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $recetaPasoImagene = $this->RecetaPasoImagenes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $recetaPasoImagene = $this->RecetaPasoImagenes->patchEntity($recetaPasoImagene, $this->request->data);
            if ($this->RecetaPasoImagenes->save($recetaPasoImagene)) {
                $this->Flash->success(__('The receta paso imagene has been saved.'));
                return $this->redirect(['action' => 'index','recetaPaso_id'=>$recetaPasoImagene->receta_paso_id]);
            } else {
                $this->Flash->error(__('The receta paso imagene could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('recetaPasoImagene'));
        $this->set('_serialize', ['recetaPasoImagene']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Receta Paso Imagene id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $recetaPasoImagene = $this->RecetaPasoImagenes->get($id);
        if ($this->RecetaPasoImagenes->delete($recetaPasoImagene)) {
            $this->Flash->success(__('The receta paso imagene has been deleted.'));
        } else {
            $this->Flash->error(__('The receta paso imagene could not be deleted. Please, try again.'));
        }
         return $this->redirect(['action' => 'index','recetaPaso_id'=>$recetaPasoImagene->receta_paso_id]);
    }
}
