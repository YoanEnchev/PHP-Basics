<?php

interface IDefenseBeforeAttack
{
   public function raiseShields_beforeAttack();

   public function removeShields_afterAttack();
}