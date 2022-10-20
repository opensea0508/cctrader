<html>
    <style>
        [style*="--aspect-ratio"] > :first-child {
  width: 100%;
}
[style*="--aspect-ratio"] > img {  
  height: auto;
} 
@supports (--custom:property) {
  [style*="--aspect-ratio"] {
    position: relative;
  }
  [style*="--aspect-ratio"]::before {
    content: "";
    display: block;
    padding-bottom: calc(100% / (var(--aspect-ratio)));
  }  
  [style*="--aspect-ratio"] > :first-child {
    position: absolute;
    top: 0;
    left: 0;
    height: 100%;
  }  
}
    </style>
    <div style="--aspect-ratio: 16/9;">
  <iframe 
    src="https://mobile.xonetrader.online/#/login
    width="1600"
    height="900"
    frameborder="0"
  >
  </iframe>
</div>
</html>