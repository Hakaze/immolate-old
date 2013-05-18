<?php namespace Immolate\Component\Emulator;

class StrongholdEmulator extends EmulatorBase
{

    public function myPage()
    {
    	$this->perform('mypage');
    }

}