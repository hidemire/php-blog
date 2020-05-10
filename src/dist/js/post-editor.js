window.addEventListener('load', () => {
  const editor = new EditorJS({
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

  const tagSelector = document.querySelector('#editor-tag-selector');
  const saveButton = document.querySelector('#editor-save-button');

  saveButton.addEventListener('click', async () => {
    saveButton.disabled = true;

    const data = await editor.save();
    console.log('data', data, JSON.stringify(data));
    const header = data.blocks.find((item) => item.type === 'header');
    const selectedTag = tagSelector.value === 'null' ? null : tagSelector.value;
    
    console.log('selectedTag', selectedTag === 'null');
    console.log('header', header);

    $.ajax({
      type: "POST",
      url: "admin-panel-create-post.php",
      data: {
        data: JSON.stringify(data),
        title: header ? header.data.text : '',
        tagId: selectedTag
      },
      success : function(){
        window.location = "admin-panel.php";
      },
      error: function(error) {
        console.log(error, false);
      }
    });
  });
});