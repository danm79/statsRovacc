<?php
namespace Controllers\Model;




class Controllers 
{
    public $id;
    public $vatsimid;
    public $nume;
    public $rating;
    public $GND;
    public $TWR;
    public $APP;
    public $CTR;
    public $OTHER;
    public $lastonline;
    public $lastpos; 

    public function exchangeArray($data)
    {
        $this->id           = (!empty($data['id']))             ? $data['id']           : null;
        $this->vatsimid     = (!empty($data['vatsimid']))       ? $data['vatsimid']     : null;
        $this->nume         = (!empty($data['nume']))           ? $data['nume']         : null;
        $this->rating       = (!empty($data['rating']))         ? $data['rating']       : null;
        $this->GND          = (!empty($data['GND']))            ? $data['GND']          : null;
        $this->TWR          = (!empty($data['TWR']))            ? $data['TWR']          : null;
        $this->APP          = (!empty($data['APP']))            ? $data['APP']          : null;
        $this->CTR          = (!empty($data['CTR']))            ? $data['CTR']          : null;
        $this->OTHER        = (!empty($data['OTHER']))          ? $data['OTHER']        : null;
        $this->lastonline   = (!empty($data['lastonline']))     ? $data['lastonline']   : null;
        $this->lastpos      = (!empty($data['lastpos']))        ? $data['lastpos']      : null; 
    }

}