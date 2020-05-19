let editor;


window.addEventListener('load', () => {
  editor = new EditorJS({
    /**
     * Id of Element that should contain Editor instance
     */
    holderId: 'editorjs',
    tools: { 
      header: Header, 
      list: List,
      quote: Quote,
      image: SimpleImage,
      warning: Warning,
      table: Table,
      delimiter: Delimiter,
      Marker: {
        class: Marker,
        shortcut: 'CMD+SHIFT+M',
      }
    },
  });

  editor.isReady.then(() => {
    if (_POST) {
      editor.render(_POST.decoded_data);
    }
  });

  tagSelector = document.querySelector('#editor-tag-selector');
  const saveButton = document.querySelector('#editor-save-button');

  saveButton.addEventListener('click', savePost);
  
  async function savePost() {
    // saveButton.disabled = true;

    const data = await editor.save();
    console.log('data', data, JSON.stringify(data));
    const header = data.blocks.find((item) => item.type === 'header');
    const selectedTag = tagSelector.value === 'null' ? null : tagSelector.value;
    
    console.log('selectedTag', selectedTag === 'null');
    console.log('header', header);

    const requestUrl = _POST ? `admin-panel-edit-post.php?id=${_POST.id}` : 'admin-panel-create-post.php';

    $.ajax({
      type: 'POST',
      url: requestUrl,
      data: {
        data: JSON.stringify(data),
        title: header ? header.data.text : '',
        tagId: selectedTag,
      },
      success : function(){
        window.location = 'admin-panel-post-list.php';
      },
      error: function(error) {
        console.log(error, false);
      }
    });
  }
});