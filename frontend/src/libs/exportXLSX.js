import XLSX from 'xlsx'

// 导出
export const exportDataSheet = (data, fileName) => {
  // let data = [[{'一':1,'二':2},{'一':3,'二':4}], [{'三':1,'四':2},{'三':3,'四':4}]]
  let wb = XLSX.utils.book_new()
  data.forEach((item, index) => {
    const sheet = XLSX.utils.json_to_sheet(item)
    XLSX.utils.book_append_sheet(wb, sheet, `sheet${index + 1}`)
  })
  const workbookBlob = workbook2blob(wb)
  openDownloadDialog(workbookBlob, fileName)
}

export const workbook2blob = (workbook) => {
  // 生成excel的配置项
  var wopts = {
    // 要生成的文件类型
    bookType: "xlsx",
    // // 是否生成Shared String Table，官方解释是，如果开启生成速度会下降，但在低版本IOS设备上有更好的兼容性
    bookSST: false,
    type: "binary"
  };
  var wbout = XLSX.write(workbook, wopts)
  // 将字符串转ArrayBuffer
  function s2ab(s) {
    var buf = new ArrayBuffer(s.length);
    var view = new Uint8Array(buf);
    for (var i = 0; i != s.length; ++i) view[i] = s.charCodeAt(i) & 0xff;
    return buf;
  }
  var blob = new Blob([s2ab(wbout)], {
    type: "application/octet-stream"
  });
  return blob;
}

// 将blob对象创建bloburl，然后用a标签实现弹出下载框
export const openDownloadDialog = (blob, fileName) => {
  if (typeof blob == "object" && blob instanceof Blob) {
    blob = URL.createObjectURL(blob); // 创建blob地址
  }
  var aLink = document.createElement("a")
  aLink.href = blob
  // HTML5新增的属性，指定保存文件名，可以不要后缀，注意，有时候 file:///模式下不会生效
  aLink.download = fileName || ""
  var event;
  if (window.MouseEvent) event = new MouseEvent("click")
  //   移动端
  else {
    event = document.createEvent("MouseEvents")
    event.initMouseEvent( "click", true, false, window, 0, 0, 0, 0, 0, false, false, false, false, 0, null );
  }
  aLink.dispatchEvent(event)
}