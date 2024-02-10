<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Tag;
use App\Models\Category;
use App\Models\User;
use App\Models\UserMeta;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use DB;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::select('id', 'status','title_image', 'views', 'author_id', 'title', 'created_at', 'category', 'slug')->where('status', 'approved')->orWhere('status', 'processing')->orderBy('created_at', 'desc')->get();
        return view('admin.article.listing', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        $categories = Category::all();
        return view('admin.article.add', compact('tags', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'title' => 'required',
            'title_image' => 'required',
            'tags' => 'required',
            'category' => 'required',
            'content' => 'required',
            'wordcount' => 'required'
        ]);

        $read_time = round((int)$request['wordcount']/200);
        if($read_time < 1) {
            $read_time = 1;
        }
        // dd($_FILES['title_image'],$_FILES['half_image'],$_FILES['content_image']);

        $tmpFile = $_FILES['title_image']['tmp_name'];
        $newFile = 'images/article/' . $_FILES['title_image']['name'];
        $result = move_uploaded_file($tmpFile, $newFile);

        $halfImageName = '';
        if(isset($request['half_image']) && !empty($request['half_image'])){
            $tmpFile1 = $_FILES['half_image']['tmp_name'];
            $newFile1 = 'images/article/' . $_FILES['half_image']['name'];
            $result1 = move_uploaded_file($tmpFile1, $newFile1);
            $halfImageName = $_FILES['half_image']['name'];;
        }
        
        $contentImageName = '';
        if(isset($request['content_image']) && !empty($request['content_image'])){
            $tmpFile2 = $_FILES['content_image']['tmp_name'];
            $newFile2 = 'images/article/' . $_FILES['content_image']['name'];
            $result2 = move_uploaded_file($tmpFile2, $newFile2);
            $contentImageName = $_FILES['content_image']['name'];
        }
            
        $createdDate = date("Y-m-d H:i:s");
        if(isset($request['created_at']) && !empty($request['created_at']))
        {
            $createdDate = date("Y-m-d H:i:s", strtotime($request['created_at']));
        }

        $request = request()->all();
        $slug = Str::of($request['title'])->slug('-');
        $tags = serialize($request['tags']);
        $request['author_unserialized_id'] = $request['author_id'];
        $authors = serialize($request['author_id']);
        $request['author_id'] = $authors;
        $request['tags'] = $tags;
        $request['title_image'] = $_FILES['title_image']['name'];
        $request['half_image'] = $halfImageName;
        $request['content_image'] = $contentImageName;
        $request['slug'] = $slug;
        $request['read_time'] = $read_time;
        $request['created_at'] = $createdDate;
        Article::create($request);

        return redirect('yn-admin/articles')
            ->with('success', 'Article created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = Article::where('id', $id)->first();
        $tag_ids = unserialize($article->tags);
        $author_ids = unserialize($article->author_id);
        $authors = [];
        foreach($author_ids as $a_id){
            $authors[] = User::where('id', $a_id)->first();
        }
        $category = Category::where('id', $article->category)->first();
        $tags = [];
        foreach($tag_ids as $id) {
            $tag = Tag::where('id', (int)$id)->first();
            $tags[] = $tag;
        }

        if($category['slug'] == 'backgrounders'){
            return redirect('/'.$article['slug']);
        }
         if($category['slug'] == 'cicm'){
            return redirect('/article/'.$article['slug']);
        }
        if($category['slug'] == 'events'){
            return redirect('/events/'.$article['slug']);
        }
        if($category['slug'] == 'central-committee'){
            return redirect('/centralcommittee/20cc/'.$article['slug']);
        }
         if($category['slug'] == 'infographics'){
            return redirect('/infographics/'.$article['slug']);
        }else{
            return view('frontend.article.view', compact('article', 'tags', 'authors', 'category'));
        }
        
        
       
        
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tags = Tag::all();
        $authors = User::where('role', 'author')->orWhere('role', 'administrator')->get();
        $categories = Category::all();
        $article = Article::where('id', $id)->first();
        // dd($article);
        $tag_ids = unserialize($article->tags);
        $author_ids = unserialize($article->author_id);
        return view('admin.article.edit', compact('tags', 'tag_ids', 'categories', 'article', 'authors', 'author_ids'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'tags' => 'required',
            'category' => 'required',
            'content' => 'required',
            'wordcount' => 'required',
        ]);

        $read_time = round((int)$request['wordcount']/200);
        if($read_time < 1) {
            $read_time = 1;
        }
        $article = Article::where('id', $id);

        // var_dump($_FILES['title_image']['name']);
        // var_dump($article->first()->title_image);
        // var_dump($request['title_image']);
        // die();
        
        if($_FILES['title_image']['name'] != ''){
            $tmpFile = $_FILES['title_image']['tmp_name'];
            $newFile = 'images/article/' . $_FILES['title_image']['name'];
            $result = move_uploaded_file($tmpFile, $newFile);
            $title_image = $_FILES['title_image']['name'];
        } else {
            $title_image = $article->first()->title_image;
        }

        if($_FILES['half_image']['name'] != ''){
            $tmpFile1 = $_FILES['half_image']['tmp_name'];
            $newFile1 = 'images/article/' . $_FILES['half_image']['name'];
            $result1 = move_uploaded_file($tmpFile1, $newFile1);
            $half_image = $_FILES['half_image']['name'];
        } else {
            $half_image = $article->first()->half_image;
        }

        if($_FILES['content_image']['name'] != ''){
            $tmpFile2 = $_FILES['content_image']['tmp_name'];
            $newFile2 = 'images/article/' . $_FILES['content_image']['name'];
            $result2 = move_uploaded_file($tmpFile2, $newFile2);
            $content_image = $_FILES['content_image']['name'];
        } else {
            $content_image = $article->first()->content_image;
        }
        
        $slug = Str::of($request['title'])->slug('-');

        $article->update([
            'title' => $request['title'],
            'content' => $request['content'],
            'tags' => serialize($request['tags']),
            'category' => $request['category'],
            'slug' => $slug,
            'subtitle' => $request['subtitle'],
            'title_image' => $title_image,
            'half_image' => $half_image,
            'content_image' => $content_image,
            'image_caption' => $request['image_caption'],
            'introduction' => $request['introduction'],
            'read_time' => $read_time,
            'keywords' => $request['keywords'],
            'author_unserialized_id' => $request['author_id'][0],
            'author_id' => serialize($request['author_id']),
            'created_at' => $request['created_at']
        ]);

        return redirect('yn-admin/articles')
            ->with('success', 'Article updated successfully');
    }

    public function update_status_processing(Request $request)
    {
        $article = Article::where('id', $request['id']);
        $article->update(['status' => 'processing']);
        return redirect('yn-author/articles')
            ->with('success', 'Send for approval');
    }

    public function update_status_approved(Request $request)
    {
        $article = Article::where('id', $request['id']);
        $article->update(['status' => 'approved']);
        return redirect('yn-admin/articles')
            ->with('success', 'Send for approval');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::where('id', $id);
        $article->delete();

        return redirect('yn-admin/articles');
    }

    public function featured($slug)
    {
        $article = Article::where('slug', $slug)->first();
        $tag_ids = unserialize($article->tags);
        $author_ids = unserialize($article->author_id);
        $authors = [];
        foreach($author_ids as $a_id){
            $authors[] = User::where('id', $a_id)->first();
        }
        $category = Category::where('id', $article->category)->first();
        
        $tags = [];
        foreach($tag_ids as $id) {
            $tag = Tag::where('id', (int)$id)->first();
            $tags[] = $tag;
        }
       
        if($category['slug'] == 'backgrounders'){
            return view('frontend.article.featured', compact('article', 'tags', 'authors', 'category'));
        }else{
            return redirect('/');
        }
    }
    
    
     public function cicmnews($slug)
    {
        $article = Article::where('slug', $slug)->first();
        $tag_ids = unserialize($article->tags);
        $author_ids = unserialize($article->author_id);
        $authors = [];
        foreach($author_ids as $a_id){
            $authors[] = User::where('id', $a_id)->first();
        }
        $category = Category::where('id', $article->category)->first();
        
        $tags = [];
        foreach($tag_ids as $id) {
            $tag = Tag::where('id', (int)$id)->first();
            $tags[] = $tag;
        }
       
        if($category['slug'] == 'cicm'){
            return view('frontend.article.cicmdesign', compact('article', 'tags', 'authors', 'category'));
        }else{
            return redirect('/');
        }
    }
    
      public function viewevent($slug)
    {
        $article = Article::where('slug', $slug)->first();
        $tag_ids = unserialize($article->tags);
        $author_ids = unserialize($article->author_id);
        $authors = [];
        foreach($author_ids as $a_id){
            $authors[] = User::where('id', $a_id)->first();
        }
        $category = Category::where('id', $article->category)->first();
        
        $tags = [];
        foreach($tag_ids as $id) {
            $tag = Tag::where('id', (int)$id)->first();
            $tags[] = $tag;
        }
       
        if($category['slug'] == 'events'){
            return view('frontend.article.viewevents', compact('article', 'tags', 'authors', 'category'));
        }else{
            return redirect('/');
        }
    }
    
       public function twentycc($slug)
    {
        $article = Article::where('slug', $slug)->first();
        $tag_ids = unserialize($article->tags);
        $author_ids = unserialize($article->author_id);
        $authors = [];
        foreach($author_ids as $a_id){
            $authors[] = User::where('id', $a_id)->first();
        }
        $category = Category::where('id', $article->category)->first();
        
        $tags = [];
        foreach($tag_ids as $id) {
            $tag = Tag::where('id', (int)$id)->first();
            $tags[] = $tag;
        }
       
        if($category['slug'] == 'central-committee'){
            return view('frontend.article.centralcommittee', compact('article', 'tags', 'authors', 'category'));
        }else{
            return redirect('/');
        }
    }
    
    
      public function graphics($slug)
    {
        $article = Article::where('slug', $slug)->first();
        $tag_ids = unserialize($article->tags);
        $author_ids = unserialize($article->author_id);
        $authors = [];
        foreach($author_ids as $a_id){
            $authors[] = User::where('id', $a_id)->first();
        }
        $category = Category::where('id', $article->category)->first();
        
        $tags = [];
        foreach($tag_ids as $id) {
            $tag = Tag::where('id', (int)$id)->first();
            $tags[] = $tag;
        }
       
        if($category['slug'] == 'infographics'){
            return view('frontend.article.infographics', compact('article', 'tags', 'authors', 'category'));
        }else{
            return redirect('/');
        }
    }
    
    
  
    
     


    public function search(Request $request)
    {
        $key = $request->s;
        $articles = DB::table('articles')
        ->join('users', 'articles.author_unserialized_id', '=', 'users.id')
         ->select('articles.id','articles.title_image', 'articles.status', 'articles.views', 'articles.author_id', 'articles.title','articles.subtitle', 'articles.created_at', 'articles.category', 'articles.slug','articles.content','users.name')
        ->where('articles.status', 'approved')
        ->where('articles.title', 'LIKE', '%'.$key.'%')
        ->orWhere('articles.content', 'LIKE', '%'.$key.'%')
        ->orWhere('users.name', 'LIKE', '%'.$key.'%')
       
        ->orderBy('articles.created_at', 'desc')
        ->get();
        
         // dd($articles);
        // $articles = Article::select('id','title_image', 'status', 'views', 'author_id', 'title', 'created_at', 'category', 'slug')->where('status', 'approved')->where('title', 'LIKE', '%'.$key.'%')->orderBy('created_at', 'desc')->get();

        return view('frontend.search', compact('articles', 'key'));
    }

    public function ajax_search(Request $request)
    {
        $key = $request->s;
        $articles = Article::select('id','title_image', 'status', 'views', 'author_id', 'title', 'created_at', 'category', 'slug')->where('status', 'approved')->where('title', 'LIKE', '%'.$key.'%')->orderBy('created_at', 'desc')->limit(5)->get();

        return $articles;
    }

    public function ajax_loadmore(Request $request)
    {
        $articles = Article::select('id','title','subtitle','title_image','slug','read_time','created_at','category')->where('status', 'approved')->orderBy('created_at', 'desc')->paginate(5);
        
        return view('frontend.loadmore',compact('articles'));
    }
}
