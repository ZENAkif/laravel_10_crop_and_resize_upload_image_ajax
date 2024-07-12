<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.js"></script>
    <title>Laravel 10 Crop and Resize Upload Image AJAX</title>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                Laravel 10 Crop and Resize Upload Image AJAX
            </div>
            <div class="card-body">
                <input type="file" name="before_crop_image" id="before_crop_image" accept="image/*" />
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div id="imageModal" class="modal fade" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="image_demo" style="width:350px; margin-top:30px"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="crop_image">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            var $image_crop = $('#image_demo').croppie({
                enableExif: true,
                viewport: {
                    width: 400,
                    height: 400,
                    // type: 'square'
                    type: 'circle'
                },
                boundary: {
                    width: 450,
                    height: 450
                }
            });

            $('#before_crop_image').on('change', function(){
                var reader = new FileReader();
                reader.onload = function(event){
                    $image_crop.croppie('bind', {
                        url: event.target.result
                    }).then(function(){
                        console.log('jQuery bind complete');
                    });
                }
                reader.readAsDataURL(this.files[0]);
                $('#imageModal').modal('show');
            });

            $('#crop_image').click(function(event){
                $image_crop.croppie('result', {
                    type: 'canvas',
                    size: 'viewport'
                }).then(function(response){
                    // Handle the cropped image data here
                    // Store image happen here
                });
            });
        });
    </script>
</body>
</html>
