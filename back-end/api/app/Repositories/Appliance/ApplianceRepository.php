<?php
namespace App\Repositories\Appliance;

use App\DTO\Appliance\ApplianceCreateDTO;
use App\DTO\Appliance\ApplianceUpdateDTO;
use App\Repositories\IRepository;
use App\Models\Appliance;
use Illuminate\Database\Eloquent\Collection;

class ApplianceRepository implements IRepository
{ 
    private Appliance $entity;
    function __construct(Appliance $entity){
        $this->entity = $entity;
    }
    public function create($data) : Appliance{
        $appliance = Appliance::create($data);
        return $appliance;
    }
    public function readOne(string $id): null|Appliance{
        $idConvert = intval($id);
        return Appliance::find($idConvert);
    }
    public function readAll(): Collection{
        return $this->entity::all();
    }
    public function update($data,string $id): null|Appliance{

        $idConvert = intval($id);
        $applianceToUpdate = Appliance::find($idConvert);
        
        if (!$applianceToUpdate) {
            return null;
        }
        
        $applianceToUpdate['name'] = $data["name"] ?? $applianceToUpdate['name'];
        $applianceToUpdate['description'] = $data["description"] ?? $applianceToUpdate['description'];
        $applianceToUpdate['brand'] = $data["brand"] ?? $applianceToUpdate['brand'];
        $applianceToUpdate['voltage'] = $data["voltage"] ?? $applianceToUpdate['voltage'];

        $applianceToUpdate->save();

        return $applianceToUpdate;
    }
    public function delete(string $id){
        return $this->entity::destroy($id);
    }
}
