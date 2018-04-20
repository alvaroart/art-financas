<?php
declare(strict_types = 1);
namespace ARTFin\Repository;

interface RepositoryInterface
{
    public function all(): array;
    
    public function create(array $data);

    public function update($id, array $data);

    public function delete($id);


}