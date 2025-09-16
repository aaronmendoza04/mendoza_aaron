<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class StudentsModel extends Model {
    protected $table = 'students';
    protected $primary_key = 'id';

    public function __construct()
    {
        parent::__construct();
    }

    public function getTableName()
    {
        return $this->table;
    }

    private function buildSearchWhere($keyword, $filter)
    {
        $keyword = trim((string)$keyword);

        if ($keyword === '') {
            return ['', []];
        }

        $like = '%' . $keyword . '%';
        $params = [];

        if ($filter === 'first_name') {
            $where = "WHERE `first_name` LIKE ?";
            $params[] = $like;
        } elseif ($filter === 'last_name') {
            $where = "WHERE `last_name` LIKE ?";
            $params[] = $like;
        } elseif ($filter === 'email') {
            $where = "WHERE `email` LIKE ?";
            $params[] = $like;
        } else {
            $where = "WHERE (`first_name` LIKE ? OR `last_name` LIKE ? OR `email` LIKE ?)";
            $params[] = $like;
            $params[] = $like;
            $params[] = $like;
        }

        return [$where, $params];
    }

    public function searchPaginate($keyword = '', $filter = '', $per_page = 10, $page = 1)
    {
        $page = max(1, (int)$page);
        $per_page = max(1, (int)$per_page);
        $offset = ($page - 1) * $per_page;

        list($whereSql, $params) = $this->buildSearchWhere($keyword, $filter);

        $sqlCount = "SELECT COUNT(*) AS cnt FROM `{$this->table}` " . ($whereSql ? $whereSql : '');
        $stmtCount = $this->db->raw($sqlCount, $params);
        $countRow = $stmtCount->fetch(\PDO::FETCH_ASSOC);
        $total = $countRow ? (int)$countRow['cnt'] : 0;

        $sqlData = "SELECT * FROM `{$this->table}` " . ($whereSql ? $whereSql : '') . " ORDER BY `{$this->primary_key}` DESC LIMIT ?, ?";
        $paramsForData = $params;
        $paramsForData[] = (int)$offset;
        $paramsForData[] = (int)$per_page;

        $stmtData = $this->db->raw($sqlData, $paramsForData);
        $results = $stmtData->fetchAll(\PDO::FETCH_ASSOC);

        return [
            'data' => $results,
            'total' => $total,
            'per_page' => $per_page,
            'current_page' => $page,
            'last_page' => ($per_page > 0) ? (int)ceil($total / $per_page) : 1
        ];
    }

    public function searchStudents($keyword = null, $filter = null)
    {
        list($whereSql, $params) = $this->buildSearchWhere($keyword, $filter);

        $sql = "SELECT * FROM `{$this->table}` " . ($whereSql ? $whereSql : '') . " ORDER BY `{$this->primary_key}` DESC";
        $stmt = $this->db->raw($sql, $params);
        $rows = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $rows;
    }
}
?>