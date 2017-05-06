<div class="panel panel-default">
    <div class="panel-heading t-panel-header">
	    Thông tin chi tiết
    </div>
    <div class="panel-body">
        <div class="btn-group pull-right">
            <button class="btn btn-default t-btn-default">Chỉnh sửa thông tin</button>
            <button class="btn btn-default t-btn-default">Xóa địa điểm</button>
        </div>
    	<div class="t-diadiem-name">Quán Thằn Lằn Chiên</div>
        <div><b>Website</b>: <a href="">http://www.thanlanchien.com</a></div>
        <div><b>Email</b>: <a href="">support@thanlanchien.com</a></div>
        <div><b>Số điện thoại</b>: <a href="">(+84) 963 32 45 67</a></div>
        <div><b>Địa chỉ</b>: 103 Nguyễn Du, Quận 1, TP. HCM</div>
        <div id="map" class="t-map"></div>
        <script>
        function myMap() {
        var mapProp= {
            center:new google.maps.LatLng(51.508742,-0.120850),
            zoom:5,
        };
        var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
        }
        </script>

        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBu-916DdpKAjTmJNIgngS6HL_kDIKU0aU&callback=myMap"></script>
    </div>
</div>