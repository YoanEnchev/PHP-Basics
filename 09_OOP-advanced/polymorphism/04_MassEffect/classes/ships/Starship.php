<?php

abstract class Starship implements IStarhip
{
    protected $health;
    protected $shields;
    protected $damage;
    protected $fuel;
    /**
     * @var Projectile
     */
    protected $projectile;
    protected $name;
    protected $enchantments;
    protected $starSystem;

    public function __construct(string $shipName, string $starSystem, array $enchantments = [])
    {
        $this->damage = 0;
        $this->shields = 0;
        $this->health = 0;
        $this->fuel = 0;

        $this->name = $shipName;
        $this->starSystem = $starSystem;
        $this->enchantments = $enchantments;
        $this->addEnchantments($enchantments);

        $className = get_class($this);
        echo "Created {$className} {$shipName}\n";
    }

    public function addEnchantments(array $enchantments)
    {
        foreach ($enchantments as $enchantment) {
            switch ($enchantment) {
                case 'ThanixCannon':
                    $this->damage += 50;
                    break;
                case 'KineticBarrier':
                    $this->shields += 100;
                    break;
                case 'ExtendedFuelCells':
                    $this->fuel += 200;
                    break;
            }
        }
    }

    public function attack(Starship $target)
    {
        if (!$this->isAlive()) {
            echo "Ship is destroyed\n";
            return;
        } else if ($this->starSystem != $target->starSystem) {
            echo "No such ship in star system\n";
            return;
        } else if ($target->isAlive()) {

            if (get_class($this) == "Frigate") {
                $this->IncreaseProjectileCount();
            }

            $hasDefence = $target instanceof IDefenseBeforeAttack;

            if ($hasDefence) {
                $target->raiseShields_beforeAttack();
            }

            $target->shields -= $this->projectile->removeShields();
            $target->health -= $this->projectile->removeHealth($target->shields);
            echo "{$this->name} attacked {$target->name}\n";

            if ($hasDefence) {
                $target->removeShields_afterAttack();
            }

            if ($target->health < 0) {
                echo "{$target->name} has been destroyed\n";
                $target->health = 0;
                $target->shields = 0;
            }
        } else {
            echo "Ship is destroyed\n";
        }
    }

    public function changeStarSystem($starSystem)
    {
        if (!$this->isAlive()) {
            echo "Ship is destroyed\n";
            return;
        } else if ($this->starSystem == $starSystem) {
            echo "Ship is already in {$starSystem}\n";
        } else {
            $neededFuel = $this->calcNeededFuelToTravel($starSystem);
            if($this->fuel >= $neededFuel) {
                echo "{$this->name} jumped from {$this->starSystem} to {$starSystem}\n";
                $this->starSystem = $starSystem;
                $this->fuel -= $neededFuel;
            }
            else {
                echo "Not enough fuel to travel\n";
            }
        }
    }

    public function statusReport()
    {
        $type = get_class($this);
        echo "--{$this->name} - {$type}\n";

        if ($this->isAlive()) {
            if (sizeof($this->enchantments) == 0) {
                $enchantments = "N/A";
            } else {
                $enchantments = join(', ', $this->enchantments);
            }

            $fuel_formatted = number_format((float)$this->fuel, 1, '.', '');

            echo "-Location: {$this->starSystem}\n";
            echo "-Health: {$this->health}\n";
            echo "-Shields: {$this->shields}\n";
            echo "-Damage: {$this->damage}\n";
            echo "-Fuel: {$fuel_formatted}\n";
            echo "-Enhancements: {$enchantments}\n";
            if ($type == "Frigate") {
                echo "-Projectiles fired: {$this->projectileCount()}\n";
            }
        } else {
            echo "(Destroyed)\n";
        }
    }

    public function getName()
    {
        return $this->name;
    }

    public function getStarSystem()
    {
        return $this->starSystem;
    }

    public function isAlive(): bool
    {
        return $this->health > 0;
    }

    private function calcNeededFuelToTravel($travelTo): int
    {
        $from = $this->starSystem;

        switch ($from) {
            case 'Artemis-Tau':
                if ($travelTo == 'Serpent-Nebula')
                    return 50;
                else if ($travelTo == 'Kepler-Verge')
                    return 120;
                break;

            case 'Serpent-Nebula':
                if ($travelTo == 'Artemis-Tau')
                    return 50;
                else if ($travelTo == 'Hades-Gamma')
                    return 360;
                break;

            case 'Hades-Gamma':
                if ($travelTo == 'Serpent-Nebula')
                    return 360;
                else if ($travelTo == 'Kepler-Verge')
                    return 145;
                break;

            case 'Kepler-Verge':
                if ($travelTo == 'Hades-Gamma')
                    return 145;
                else if ($travelTo == 'Artemis-Tau')
                    return 120;
                break;
            default:
                throw new Exception("Ship can only travel between neighbour galaxies.");
        }
    }
}