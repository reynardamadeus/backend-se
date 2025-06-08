const toolbarOptions = [
  ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
  ['blockquote', 'code-block'],
  ['link', 'image', 'video', 'formula'],
           // custom button values
  [{ 'list': 'ordered'}, { 'list': 'bullet' }, { 'list': 'check' }],
  [{ 'script': 'sub'}, { 'script': 'super' }],      // superscript/subscript
  [{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent
  [{ 'direction': 'rtl' }],                         // text direction

  [{ 'size': ['small', false, 'large', 'huge'] }],  // custom dropdown
  [{ 'header': [1, 2, 3, 4, 5, 6, false] }],

  [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults from theme
  [{ 'font': [] }],
  [{ 'align': [] }],

  ['clean']                                         // remove formatting button
];

var quill = new Quill('#editor-container', {
  theme: 'snow',
  formula: true,
  modules: {
    toolbar: {
      container: toolbarOptions,
      handlers: {
        image: function () {
          selectLocalFile('image');
        },
        video: function () {
          selectLocalFile('video');
        }
      }
    }
  }
});

function selectLocalFile(type) {
  const input = document.createElement('input');
  input.setAttribute('type', 'file');
  input.setAttribute('accept', type === 'image' ? 'image/*' : 'video/*');
  input.click();

  input.onchange = () => {
    const file = input.files[0];
    if (file) {
      const formData = new FormData();
      formData.append('file', file);
      formData.append('type', type);

      fetch('/upload', {
        method: 'POST',
        headers: {
          'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: formData
      })
      .then(res => res.json())
      .then(data => {
        const range = quill.getSelection();
        if (type === 'image') {
          quill.insertEmbed(range.index, 'image', data.url);
        } else if (type === 'video') {
          quill.insertEmbed(range.index, 'video', data.url);
        }
      });
    }
  };
}

document.querySelector('form').onsubmit = function () {
  document.querySelector('#content').value = quill.root.innerHTML;
};