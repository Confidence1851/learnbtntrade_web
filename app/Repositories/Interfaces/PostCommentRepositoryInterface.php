<?php

namespace App\Repositories\Interfaces;

interface PostCommentRepositoryInterface
{

    /**
     * Get's Model Instance
     *
     * @param int
     */
    public function model();


    /**
     * Create`s new post comment
     *
     * @param int
     */
    public function create(array $data);



    /**
     * Get's a post comment by it's ID
     *
     * @param int
     */
    public function find($id);

    /**
     * Get's all post comments.
     *
     * @return mixed
     */
    public function all();

    /**
     * Deletes a post comment.
     *
     * @param int
     */
    public function delete($id);

    /**
     * Updates a post comment.
     *
     * @param int
     * @param array
     */
    public function update($id, array $data);
}
