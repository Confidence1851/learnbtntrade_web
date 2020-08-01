<?php

namespace App\Repositories\Interfaces;

interface CourseRepositoryInterface
{

    /**
     * Get's Model Instance
     *
     * @param int
     */
    public function model();


    /**
     * Create`s new Course 
     *
     * @param int
     */
    public function create(array $data);



    /**
     * Get's a Course  by it's ID
     *
     * @param int
     */
    public function find($id);

    /**
     * Get's all Course categories.
     *
     * @return mixed
     */
    public function all();

    /**
     * Deletes a Course .
     *
     * @param int
     */
    public function delete($id);

    /**
     * Updates a Course .
     *
     * @param int
     * @param array
     */
    public function update($id, array $data);
}
