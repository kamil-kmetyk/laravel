import Quill from 'quill';

export class Core {
  constructor() {
    this.initQuill();
  }

  initQuill() {
    const wysiwygElement = document.getElementsByClassName('wysiwyg-editor');

    if (0 === wysiwygElement.length) {
      return;
    }

    const editorLength = wysiwygElement.length;
    const editorSettings = {
      theme: 'bubble',
      modules: {
        toolbar: [
          ['bold', 'italic', 'underline', 'strike'],
          ['blockquote', 'code-block'],
          [{ 'header': 1 }, { 'header': 2 }],
          [{ 'list': 'ordered'}, { 'list': 'bullet' }],
          [{ 'indent': '-1'}, { 'indent': '+1' }],
          [{ 'align': [] }],
          ['clean']
        ]
      }
    };

    for (let i = 0; i < editorLength; i++) {
      const editor = wysiwygElement[i];
      const editorForm = editor.closest('form');
      const inputName = editor.getAttribute('data-input-name');
      const input = editorForm.querySelector(`input[name="${inputName}"]`);
      const quill = new Quill(editor, editorSettings);
      const delta = quill.clipboard.convert(input.value);

      quill.setContents(delta, 'silent');

      editorForm.onsubmit = () => {
        input.value = quill.container.firstChild.innerHTML;
      }
    }
  }

}
