// 最小値のスライダーの値を更新する関数
function updateMinValue() {
    var minValue = document.getElementById("min-distance").value;
    document.getElementById("min-distance-value").textContent = minValue;
}

// 最大値のスライダーの値を更新する関数
function updateMaxValue() {
    var maxValue = document.getElementById("max-distance").value;
    document.getElementById("max-distance-value").textContent = maxValue;
}

// 初期値の表示を設定
updateMinValue();
updateMaxValue();