<?php

require 'config.php';
require 'HttpClient.php';

class NovelModel {
    private $httpClient;
    private $couchDBUrl;
    private $databaseName;

    /**
     * Khởi tạo đối tượng NovelModel.
     * Thiết lập đối tượng HttpClient và kiểm tra cơ sở dữ liệu.
     */
    public function __construct() {
        $this->httpClient = null;
        $this->couchDBUrl = rtrim(COUCHDB_URL, '/'); // Sử dụng trực tiếp COUCHDB_URL
        $this->databaseName = COUCHDB_DATABASE; // Sử dụng trực tiếp COUCHDB_DATABASE

        $this->createNovelDatabase();
    }

    /**
     * Lấy đối tượng HttpClient hoặc tạo mới nếu chưa có.
     *
     * @return HttpClient Đối tượng HttpClient.
     */
    private function getHttpClient() {
        if ($this->httpClient === null) {
            $this->httpClient = new HttpClient();
        }
        return $this->httpClient;
    }

    /**
     * Kiểm tra và tạo cơ sở dữ liệu nếu chưa tồn tại.
     */
    private function createNovelDatabase() {
        $existingDatabases = json_decode($this->getHttpClient()->get("{$this->couchDBUrl}/_all_dbs"), true);

        if (!in_array($this->databaseName, $existingDatabases)) {
            // Tạo cơ sở dữ liệu nếu nó chưa tồn tại
            $this->getHttpClient()->put("{$this->couchDBUrl}/{$this->databaseName}", []);
        }
    }

    /**
     * Lấy tất cả các tác phẩm từ cơ sở dữ liệu.
     *
     * @return array Mảng chứa thông tin của tất cả các tác phẩm.
     */
    public function getAllNovels() {
        // Lấy tất cả các tác phẩm từ cơ sở dữ liệu
        $result = $this->getHttpClient()->get("{$this->couchDBUrl}/{$this->databaseName}/_all_docs?include_docs=true");
        $novels = json_decode($result, true)['rows'];

        return array_map(function ($row) {
            return $row['doc'];
        }, $novels);
    }

    /**
     * Thêm một tác phẩm mới vào cơ sở dữ liệu.
     *
     * @param string $title  Tiêu đề của tác phẩm.
     * @param string $author Tác giả của tác phẩm.
     */
    public function addNovel($title, $author) {
        // Thêm một tác phẩm mới vào cơ sở dữ liệu
        $this->getHttpClient()->post("{$this->couchDBUrl}/{$this->databaseName}", [
            'title' => $title,
            'author' => $author,
        ]);
    }

    /**
     * Cập nhật thông tin của một tác phẩm.
     *
     * @param string $id     ID của tác phẩm cần cập nhật.
     * @param string $title  Tiêu đề mới của tác phẩm.
     * @param string $author Tác giả mới của tác phẩm.
     */
    public function updateNovel($id, $title, $author) {
        // Cập nhật thông tin của một tác phẩm
        $doc = json_decode($this->getHttpClient()->get("{$this->couchDBUrl}/{$this->databaseName}/$id"), true);

        $doc['title'] = $title;
        $doc['author'] = $author;

        $this->getHttpClient()->put("{$this->couchDBUrl}/{$this->databaseName}/$id", $doc);
    }

    /**
     * Xóa một tác phẩm khỏi cơ sở dữ liệu.
     *
     * @param string $id ID của tác phẩm cần xóa.
     */
    public function deleteNovel($id) {
        // Xóa một tác phẩm khỏi cơ sở dữ liệu
        $doc = json_decode($this->getHttpClient()->get("{$this->couchDBUrl}/{$this->databaseName}/$id"), true);
        $this->getHttpClient()->delete("{$this->couchDBUrl}/{$this->databaseName}/$id?rev={$doc['_rev']}");
    }

    /**
     * Lấy thông tin của một tác phẩm theo ID.
     *
     * @param string $id ID của tác phẩm cần lấy thông tin.
     *
     * @return array|null Mảng chứa thông tin của tác phẩm hoặc null nếu không tìm thấy.
     */
    public function getNovelById($id) {
        // Lấy thông tin của một tác phẩm theo ID
        $result = $this->getHttpClient()->get("{$this->couchDBUrl}/{$this->databaseName}/$id");
        $novel = json_decode($result, true);

        return $novel;
    }
}

?>
