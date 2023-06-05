<button id="popupButton">点击弹出内容</button>

<script type="text/javascript">
    document.getElementById('popupButton').addEventListener('click', function() {
        var popupDiv = document.createElement('div');
        popupDiv.style.cssText = "position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5); z-index: 999; display: flex; justify-content: center; align-items: center;";
        var contentDiv = document.createElement('div');
        contentDiv.style.cssText = "background-color: rgba(255, 255, 255, 0.5); margin-left: 80px; margin-right: 80px; margin-top: 150px; backdrop-filter: blur(5px);";
        contentDiv.innerHTML = '<?php include("../organizer/statistics.php"); ?>';
        popupDiv.appendChild(contentDiv);
        document.body.appendChild(popupDiv);
    });
</script>