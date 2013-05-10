<?php namespace Immolate\Component\Emulator;

class StrongholdEmulator extends EmulatorBase
{

    public function myPage()
    {
        return $this->yokai->execute('mypage',array(
            'php-sess-id' => $this->php_sess_id
        ));
    }

}