<?php

namespace App\Repositories\Interfaces;

interface CourseCategoryRepositoryInterface
{

    /**
     * Get's Model Instance
     *
     * @param int
     */
    public function model();


    /**
     * Create`s new Course category
     *
     * @param int
     */
    public function create(array $data);



    /**
     * Get's a Course category by it's ID
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
     * Deletes a Course category.
     *
     * @param int
     */
    public function delete($id);

    /**
     * Updates a Course category.
     *
     * @param int
     * @param array
     */
    public function update($id, array $data);
}
