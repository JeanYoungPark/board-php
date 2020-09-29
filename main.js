/*-------------------editor control--------------------*/
var container = document.getElementById('editor');
var toolbarOptions = [
    ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
    //['blockquote', 'code-block'],
  
    //[{ 'header': 1 }, { 'header': 2 }],               // custom button values
    [{ 'list': 'ordered'}, { 'list': 'bullet' }],
    //[{ 'script': 'sub'}, { 'script': 'super' }],      // superscript/subscript
    //[{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent
    //[{ 'direction': 'rtl' }],                         // text direction
  
    //[{ 'size': ['small', false, 'large', 'huge'] }],  // custom dropdown
    [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
  
    [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
    //[{ 'font': [] }],
    [{ 'align': [] }],
    ['link'],

    ['clean']                                         // remove formatting button
];

var options = {
    modules: {
        toolbar: toolbarOptions
    },
    placeholder: '내용을 입력하세요',
    theme: 'snow'
  };

// if(container) {
//     var editor = new Quill(container, options);
// }

/*-------------------form control--------------------*/
var form = document.getElementById('write_form');
var content = document.getElementById('content');
var title = document.getElementById('title');
var val;

if(form) {
    if(container) {
        var editor = new Quill(container, options);
    }

    form.onsubmit = function a(){
        val = document.getElementsByClassName('ql-editor');
        var content_text = val[0].innerHTML;
        var title_text = title.value;
        if(!title_text) {
            alert('제목을 입력해주세요.');
            return false;
        }
        // if(!text) {
        //     alert('내용을 입력해주세요.');
        //     return false;
        // }
        // content.value = content_text;
        content.value = JSON.stringify(editor.getContents().ops);
        title.value = title_text;
    }
}

if(json_data) {
    if(container) {
        var editor = new Quill(container);
    }
    console.log(JSON_parse(json_data));
    // editor.setContents();
}