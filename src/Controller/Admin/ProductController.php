<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

class ProductController extends AppController
{
  public function index(){
    
  }

  public function add()
      {
        $product = $this->Product->newEntity();
        if ($this->request->is('post')) {
            $product = $this->Product->patchEntity($product, $this->request->getData());
            if ($this->Product->save($product)) {
                $this->Flash->success(__('The product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product could not be saved. Please, try again.'));
        }
        $this->set(compact('product'));
        $this->set('_serialize', ['product']);
      }

      public function edit($id = null)
      {
          $product = $this->Product->get($id, [
              'contain' => []
          ]);
          if ($this->request->is(['patch', 'post', 'put'])) {
              $product = $this->Product->patchEntity($product, $this->request->getData());
              if ($this->Product->save($product)) {
                  $this->Flash->success(__('The product has been saved.'));

                  return $this->redirect(['action' => 'index']);
              }
              $this->Flash->error(__('The product could not be saved. Please, try again.'));
          }
          $this->set(compact('product'));
          $this->set('_serialize', ['product']);
      }

      public function delete($id = null)
      {
          $this->request->allowMethod(['post', 'delete']);
          $product = $this->Product->get($id);
          if ($this->Product->delete($product)) {
              $this->Flash->success(__('The product has been deleted.'));
          } else {
              $this->Flash->error(__('The product could not be deleted. Please, try again.'));
          }

          return $this->redirect(['action' => 'index']);
      }
}
