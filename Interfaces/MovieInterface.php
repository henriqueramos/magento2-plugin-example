<?php
namespace RamosHenrique\AdminTMDB\Interfaces;

interface MovieInterface {
    /**
     * Save Movie Method
     * @param string $movieId
     * @return string
     */
    public function saveMovie($movieId);
}