import ClassicEditor from '@ckeditor/ckeditor5-build-classic';

// Or using the CommonJS version:
// const ClassicEditor = require( '@ckeditor/ckeditor5-build-classic' );
function MyCustomUploadAdapterPlugin(editor) {
    editor.plugins.get("FileRepository").createUploadAdapter = (loader) => {
        return {
            upload() {
                return loader.file.then(file => new Promise((resolve, reject) => {
                    upload(file)
                }))
            },
            abort() {}
        }
    }
}

function editor(){
   return ClassicEditor
	.catch( error => {
		console.error( 'There was a problem initializing the editor.', error );
	} );
}
