import marked from 'marked';


// マークダウンをプレビュー画面に表示
$(function() {
    marked.setOptions({
        langPrefix: '',
        breaks : true,
        sanitize: true,
    });
});

// テキストエリア（id="markdown_editor_textarea")に文字が打ち込まれていったら、
// テキストエリアの文字を取得してmarkdownをHTMLに変換します。
// その後、プレビューに表示を実行
$('.step-tab-panel').keyup(function() {
    var html = marked(getHtml($(this).val()));
    $('.step-tab-panel').html(html);
});

// 個別の記事画面のマークダウンをHTMLに変換する
// var target = $('.item-body')で、item-bodyがクラスのものを取得して、
// marked.jsを使用してマークダウンをHTMLに変換
// $('.item-body').html(html);で、
// もう一度クラスがitem-bodyの所にHTMLを返してあげる
var target = $('.step-tab-panel')
var html = marked(getHtml(target.html()));
$('.step-tab-panel').html(html);

// 比較演算子が &lt; 等になるので置換
function getHtml(html) {
    html = html.replace(/&lt;/g, '<');
    html = html.replace(/&gt;/g, '>');
    html = html.replace(/&amp;/g, '&');
    return html;
}


ClassicEditor
.create( document.querySelector( '#markdown_editor_textarea' ), {
    placeholder: 'ツールバーやMarkdown記法を用いて書いてみましょう！',
} )
.then( markdown_editor_textarea => {
    console.log( editor );
} )
.catch( error => {
    console.error( error );
} );

ClassicEditor
.create( document.querySelector( '#markdown_editor_textarea2' ), {
    placeholder: 'ツールバーやMarkdown記法を用いて書いてみましょう！',
} )
.then( markdown_editor_textarea => {
    console.log( editor );
} )
.catch( error => {
    console.error( error );
} );

ClassicEditor
.create( document.querySelector( '#markdown_editor_textarea3' ), {
    placeholder: 'ツールバーやMarkdown記法を用いて書いてみましょう！',
} )
.then( markdown_editor_textarea => {
    console.log( editor );
} )
.catch( error => {
    console.error( error );
} );

ClassicEditor
.create( document.querySelector( '#markdown_editor_textarea4' ), {
    placeholder: 'ツールバーやMarkdown記法を用いて書いてみましょう！',
} )
.then( markdown_editor_textarea => {
    console.log( editor );
} )
.catch( error => {
    console.error( error );
} );
