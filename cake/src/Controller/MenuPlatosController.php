<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * MenuPlatos Controller
 *
 * @property \App\Model\Table\MenuPlatosTable $MenuPlatos
 */
class MenuPlatosController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Menus', 'Recetas']
        ];
        $this->set('menuPlatos', $this->paginate($this->MenuPlatos));
        $this->set('_serialize', ['menuPlatos']);
    }

    /**
     * View method
     *
     * @param string|null $id Menu Plato id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $menuPlato = $this->MenuPlatos->get($id, [
            'contain' => ['Menus', 'Recetas']
        ]);
        $this->set('menuPlato', $menuPlato);
        $this->set('_serialize', ['menuPlato']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $menuPlato = $this->MenuPlatos->newEntity();
        if ($this->request->is('post')) {
            $menuPlato = $this->MenuPlatos->patchEntity($menuPlato, $this->request->data);
            if ($this->MenuPlatos->save($menuPlato)) {
                $this->Flash->success(__('The menu plato has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The menu plato could not be saved. Please, try again.'));
            }
        }
        $menus = $this->MenuPlatos->Menus->find('list', ['limit' => 200]);
        $recetas = $this->MenuPlatos->Recetas->find('list', ['limit' => 200]);
        $this->set(compact('menuPlato', 'menus', 'recetas'));
        $this->set('_serialize', ['menuPlato']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Menu Plato id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $menuPlato = $this->MenuPlatos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $menuPlato = $this->MenuPlatos->patchEntity($menuPlato, $this->request->data);
            if ($this->MenuPlatos->save($menuPlato)) {
                $this->Flash->success(__('The menu plato has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The menu plato could not be saved. Please, try again.'));
            }
        }
        $menus = $this->MenuPlatos->Menus->find('list', ['limit' => 200]);
        $recetas = $this->MenuPlatos->Recetas->find('list', ['limit' => 200]);
        $this->set(compact('menuPlato', 'menus', 'recetas'));
        $this->set('_serialize', ['menuPlato']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Menu Plato id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $menuPlato = $this->MenuPlatos->get($id);
        if ($this->MenuPlatos->delete($menuPlato)) {
            $this->Flash->success(__('The menu plato has been deleted.'));
        } else {
            $this->Flash->error(__('The menu plato could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }
}
