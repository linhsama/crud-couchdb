<?php

class HttpClient {
    /**
     * Thực hiện yêu cầu GET đến URL được cung cấp.
     *
     * @param string $url URL của yêu cầu GET.
     *
     * @return string Dữ liệu nhận được từ yêu cầu GET.
     */
    public static function get($url) {
        $result = @file_get_contents($url);

        if ($result === false) {
            die("Lỗi khi thực hiện yêu cầu GET tới $url.");
        }

        return $result;
    }

    /**
     * Thực hiện yêu cầu POST đến URL được cung cấp với dữ liệu JSON.
     *
     * @param string $url  URL của yêu cầu POST.
     * @param array  $data Dữ liệu được gửi dưới dạng mảng.
     *
     * @return string Dữ liệu nhận được từ yêu cầu POST.
     */
    public static function post($url, $data) {
        $headers = ['Content-Type: application/json'];
        $options = [
            'http' => [
                'header' => implode("\r\n", $headers),
                'method' => 'POST',
                'content' => json_encode($data),
            ],
        ];

        $context = stream_context_create($options);
        $result = @file_get_contents($url, false, $context);

        if ($result === false) {
            die("Lỗi khi thực hiện yêu cầu POST tới $url.");
        }

        return $result;
    }

    /**
     * Thực hiện yêu cầu PUT đến URL được cung cấp với dữ liệu JSON.
     *
     * @param string $url  URL của yêu cầu PUT.
     * @param array  $data Dữ liệu được gửi dưới dạng mảng.
     *
     * @return string Dữ liệu nhận được từ yêu cầu PUT.
     */
    public static function put($url, $data) {
        $headers = ['Content-Type: application/json'];
        $options = [
            'http' => [
                'header' => implode("\r\n", $headers),
                'method' => 'PUT',
                'content' => json_encode($data),
            ],
        ];

        $context = stream_context_create($options);
        $result = @file_get_contents($url, false, $context);

        if ($result === false) {
            die("Lỗi khi thực hiện yêu cầu PUT tới $url.");
        }

        return $result;
    }

    /**
     * Thực hiện yêu cầu DELETE đến URL được cung cấp.
     *
     * @param string $url URL của yêu cầu DELETE.
     *
     * @return string Dữ liệu nhận được từ yêu cầu DELETE.
     */
    public static function delete($url) {
        $headers = ['Content-Type: application/json'];
        $options = [
            'http' => [
                'header' => implode("\r\n", $headers),
                'method' => 'DELETE',
            ],
        ];

        $context = stream_context_create($options);
        $result = @file_get_contents($url, false, $context);

        if ($result === false) {
            die("Lỗi khi thực hiện yêu cầu DELETE tới $url.");
        }

        return $result;
    }
}
?>
