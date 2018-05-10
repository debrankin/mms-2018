function wagt_map_2() {
  if(GBrowserIsCompatible()) {
    if(!document.getElementById('wagt_map_2')) return false;
    var map = new GMap2(document.getElementById('wagt_map_2'));
    map.enableContinuousZoom();
    map.enableDoubleClickZoom();
    map.addControl(new GSmallMapControl());
    map.addControl(new GScaleControl());
    map.addControl(new GMapTypeControl());
    map.addControl(new GOverviewMapControl());
    var geocoder = new GClientGeocoder();
    
    var icon = new GIcon();
    var markerStyle = 'Google Traditional (flat)';
    var markerColor = 'Pacifica';
    icon.image = 'http://google.webassist.com/google/markers/traditionalflat/pacifica.png';
    icon.shadow = 'http://google.webassist.com/google/markers/traditionalflat/shadow.png';
    icon.iconSize = new GSize(34,35);
    icon.shadowSize = new GSize(34,35);
    icon.iconAnchor = new GPoint(9,23);
    icon.infoWindowAnchor = new GPoint(19,0);
    icon.printImage = 'http://google.webassist.com/google/markers/traditionalflat/pacifica.gif';
    icon.mozPrintImage = 'http://google.webassist.com/google/markers/traditionalflat/pacifica_mozprint.png';
    icon.printShadow = 'http://google.webassist.com/google/markers/traditionalflat/shadow.gif';
    icon.transparent = 'http://google.webassist.com/google/markers/traditionalflat/pacifica_transparent.png';

    var address_0 = {
      street: '143 State Street',
      city: 'Portland',
      state: 'Me',
      zip: '04101',
      country: 'USA',
      infowindow: 'custom',
      infowindowtext: '<span style="font: 12px Verdana, Arial, Helvetica, sans-serif; color: #000;"><strong>Address:</strong><br />143 State Street<br />Portland, Me 04101 USA</span>',
      full: '143 State Street, Portland, Me, 04101, USA',
      isdefault: true
    };
    
    geocoder.getLatLng (
      address_0.full,
      function(point) {
        if(point) {
          map.setCenter(point, 13);
          var marker = new GMarker(point, icon);
          GEvent.addListener(marker, 'click', function() {
            marker.openInfoWindowHtml(address_0.infowindowtext);
          });
          map.addOverlay(marker);
          marker.openInfoWindowHtml(address_0.infowindowtext);
        }
        else {
          map.setCenter(new GLatLng(37.4419, -122.1419), 13);
        }
      }
    );

  }
}