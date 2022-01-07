<?php
namespace Support;

class FlashMessage
{
    public function success(string $message)
    {
        echo
        "
        <script>
          Swal.fire({
              position: 'center',
              icon: 'success',
              title: '$message',
              showConfirmButton: false,
              timer: 2700
            })
        </script>
        ";
    }

    public function info(string $message)
    {
        echo
        "
        <script>
          Swal.fire({
              position: 'center',
              icon: 'info',
              title: '$message',
              showConfirmButton: false,
              timer: 2700
            })
        </script>
        ";
    }

    public function error(string $message)
    {
//        echo "<pre>";
//        var_dump($message);
//        echo "</pre>";
//        die;
        echo
        "
        <script>
          Swal.fire({
              position: 'center',
              icon: 'error',
              title: '$message',
              showConfirmButton: false,
              timer: 2700
            })
        </script>
        ";
    }

    public function warning(string $message)
    {
        echo
        "
        <script>
          Swal.fire({
              position: 'center',
              icon: 'warning',
              title: '$message',
              showConfirmButton: false,
              timer: 2700
            })
        </script>
        ";
    }
}