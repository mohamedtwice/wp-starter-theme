<?php

namespace Sehrgut\StarterTheme\Lib;

/**
 * Represent a string of search terms as a WP_Query parameters array.
 */
class QueryParser
{
    /**
     * The original query used to initialize this.
     *
     * @var string
     */
    protected $original_query = '';

    /**
     * Holds the terms that are searched.
     *
     * @var array
     */
    protected $positive_terms = [];

    /**
     * Holds the terms that should be excluded from search.
     *
     * @var array
     */
    protected $negative_terms = [];

    /**
     * Initialize a new instance from a search string.
     *
     * @param string $search
     */
    public function __construct(string $search)
    {
        $this->original_query = $search;
        $this->parse($search);
    }

    /**
     * Represent this object as a WP_Query arguments array.
     *
     * @param array $args Base query arguments (may be overridden)
     * @return array
     */
    public function queryArgs(array $args = [])
    {
        $args['s'] = $this->original_query;
        return $args;
    }

    /**
     * Represent this object as a WP_Meta_Query arguments array.
     * @param array $args Base query arguments (may be overridden)
     * @return array
     */
    public function metaQueryArgs(array $args = [])
    {
        return $this->getMetaQuery($args);
    }

    /**
     * Parse the search string into positive and negative terms.
     *
     * @param  string $search The search terms as string
     * @return $this
     */
    protected function parse(string $search)
    {
        $terms = explode(' ', $search);

        array_map(function($term) {
            $term = trim($term);
            if (substr($term, 0, 1) === '-') {
                $this->negative_terms[] = substr($term, 1);
            }
            else {
                $this->positive_terms[] = $term;
            }
        }, $terms);

        return $this;
    }

    /**
     * Build meta query args from the terms.
     *
     * @param array $args Base query arguments (may be overridden)
     * @return array
     */
    protected function getMetaQuery(array $args = [])
    {
        $args['relation'] = 'AND';

        /* Negative terms */
        foreach ($this->negative_terms as $term) {
            $args[] = [
                'compare' => 'NOT LIKE',
                'value' => $term,
            ];
        }

        /* Positive terms */
        foreach ($this->positive_terms as $term) {
            $args[] = [
                'compare' => 'LIKE',
                'value' => $term,
            ];
        }

        return $args;
    }
}