<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class Pagination
{
    private $base_url;
    private $total_rows;
    private $per_page;
    private $num_links;
    private $cur_page;
    private $first_link;
    private $next_link;
    private $prev_link;
    private $last_link;
    private $full_tag_open;
    private $full_tag_close;
    private $first_tag_open;
    private $first_tag_close;
    private $last_tag_open;
    private $last_tag_close;
    private $cur_tag_open;
    private $cur_tag_close;
    private $next_tag_open;
    private $next_tag_close;
    private $prev_tag_open;
    private $prev_tag_close;
    private $num_tag_open;
    private $num_tag_close;
    private $page_query_string;
    private $query_string_segment;

    public function __construct()
    {
        $this->base_url = '';
        $this->total_rows = 0;
        $this->per_page = 10;
        $this->num_links = 2;
        $this->cur_page = 0;
        $this->first_link = '&lsaquo; First';
        $this->next_link = '>';
        $this->prev_link = '<';
        $this->last_link = 'Last &rsaquo;';
        $this->full_tag_open = '<div class="flex justify-center mt-6">';
        $this->full_tag_close = '</div>';
        $this->first_tag_open = '<span class="px-3 py-2 mx-1 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-l-md cursor-pointer hover:bg-gray-50">';
        $this->first_tag_close = '</span>';
        $this->last_tag_open = '<span class="px-3 py-2 mx-1 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-r-md cursor-pointer hover:bg-gray-50">';
        $this->last_tag_close = '</span>';
        $this->cur_tag_open = '<span class="px-3 py-2 mx-1 text-sm font-medium text-white bg-sky-500 border border-sky-500 rounded-md">';
        $this->cur_tag_close = '</span>';
        $this->next_tag_open = '<span class="px-3 py-2 mx-1 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-r-md cursor-pointer hover:bg-gray-50">';
        $this->next_tag_close = '</span>';
        $this->prev_tag_open = '<span class="px-3 py-2 mx-1 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-l-md cursor-pointer hover:bg-gray-50">';
        $this->prev_tag_close = '</span>';
        $this->num_tag_open = '<span class="px-3 py-2 mx-1 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-pointer hover:bg-gray-50">';
        $this->num_tag_close = '</span>';
        $this->page_query_string = false;
        $this->query_string_segment = 'page';
    }

    public function initiate($total_rows, $per_page = 10, $cur_page = 1, $base_url = '', $num_links = 2)
    {
        $this->total_rows = (int) $total_rows;
        $this->per_page = (int) $per_page;
        $this->cur_page = (int) $cur_page;
        $this->base_url = $base_url;
        $this->num_links = (int) $num_links;

        if ($this->base_url == '') {
            if (isset($_SERVER['REQUEST_URI'])) {
                $this->base_url = $_SERVER['REQUEST_URI'];
            } else {
                $this->base_url = $_SERVER['PHP_SELF'];
            }
        }

        return $this;
    }

    public function create_links()
    {
        if ($this->total_rows == 0 || $this->per_page == 0) {
            return '';
        }

        $num_pages = ceil($this->total_rows / $this->per_page);

        if ($num_pages == 1) {
            return '';
        }

        if ($this->cur_page > $num_pages) {
            $this->cur_page = $num_pages;
        }

        $uri_page_number = $this->cur_page;

        $start = (($this->cur_page - $this->num_links) > 0) ? $this->cur_page - ($this->num_links - 1) : 1;
        $end = (($this->cur_page + $this->num_links) < $num_pages) ? $this->cur_page + $this->num_links : $num_pages;

        $output = '';

        if ($this->cur_page > 1) {
            $output .= $this->prev_tag_open . '<a href="' . $this->create_url($this->cur_page - 1) . '">' . $this->prev_link . '</a>' . $this->prev_tag_close;
        }

        for ($loop = $start - 1; $loop <= $end; $loop++) {
            $i = $loop;

            if ($i >= 1) {
                if ($this->cur_page == $i) {
                    $output .= $this->cur_tag_open . $i . $this->cur_tag_close;
                } else {
                    $n = ($i == $num_pages) ? $this->last_tag_open : $this->num_tag_open;
                    $output .= $n . '<a href="' . $this->create_url($i) . '">' . $i . '</a>' . $this->num_tag_close;
                }
            }
        }

        if ($this->cur_page < $num_pages) {
            $output .= $this->next_tag_open . '<a href="' . $this->create_url($this->cur_page + 1) . '">' . $this->next_link . '</a>' . $this->next_tag_close;
        }

        $output = $this->full_tag_open . $output . $this->full_tag_close;

        return $output;
    }

    private function create_url($page)
    {
        if ($this->page_query_string === true) {
            $url = $this->base_url . '?' . $this->query_string_segment . '=' . $page;
        } else {
            $url = $this->base_url . '?page=' . $page;
        }

        return $url;
    }

    public function set_tag_open($tag, $value)
    {
        $this->{$tag . '_tag_open'} = $value;
        return $this;
    }

    public function set_tag_close($tag, $value)
    {
        $this->{$tag . '_tag_close'} = $value;
        return $this;
    }

    public function set_link_text($link, $value)
    {
        $this->{$link . '_link'} = $value;
        return $this;
    }
}
