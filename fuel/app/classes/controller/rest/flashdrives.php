<?php
class Controller_Rest_Flashdrives extends Controller_Rest {

    public function get_()
    {
        $id = $this->param("id");
        Log::info("Get called with id: " . $id);
        $drive = Model_Flashdrives::find($id);
        if($drive) {
            $this->response($drive->as_array());
        }
    }
    public function put_()
    {
        Log::info("---------------------------------");
        $id = $this->param("id");
        $model = Input::put('model');
        $model_array = json_decode($model, true);
        Log::info("Put called with id: " . $id . " and model: " . $model);
        $drive = Model_Flashdrives::find($id);
        $drive->name = $model_array['name'];
        $drive->brand = $model_array['brand'];
        $drive->capacity = $model_array['capacity'];
        $drive->price = $model_array['price'];
        $drive->description = $model_array['description'];
        if ($drive and $drive->save())
        {
            Log::info("after save, drive: " . print_r($drive->as_array(), true));
            //$this->response($drive->as_array(), 200);
        }
        //$this->response($drive->as_array());
    }
    public function post_()
    {
        Log::info("---------------------------------");
        $model = html_entity_decode(Input::post('model'));
        Log::info("Post called with model: " . $model);
        $model_array = json_decode($model, true);
        Log::info("Model : " . print_r($model_array, true));
        $flashdrives = Model_Flashdrives::factory(array(
            'name' => $model_array['name'],
            'brand' => $model_array['brand'],
            'capacity' => $model_array['capacity'],
            'price' => $model_array['price'],
            'description' => $model_array['description'],
        ));

        if ($flashdrives and $flashdrives->save())
        {
            Log::info("after save, flashdrives: " . print_r($flashdrives->as_array(), true));
            $this->response($flashdrives->as_array(), 200);
        }
        // TODO: we need to return a model that has an ID
    }
    public function delete_()
    {
        $id = $this->param("id");
        Log::info("Delete called with id: " . $id);
        $drive = Model_Flashdrives::find($id);

        if ($drive and $drive->delete())
        {
            Log::info("Flash drive $id found and deleted.");
            $this->response(array('success' => true), 200);
        }

        // TODO: delete the model in the database. How do we return a status?
    }
}
