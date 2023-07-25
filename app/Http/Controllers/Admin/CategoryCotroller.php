<?php
namespace App\Http\Controllers\Admin;
use App\Components\Works;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class CategoryCotroller extends Controller
{
    public function index()
    {
        $this->data['title'] = "Danh Mục sản phẩm";
        $this->data['post'] = "Dashboard";
        $this->data['list'] = Category::paginate(5);
        return view("backend.Category.index", $this->data)->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function addCategory()
    {
        $this->data['title'] = "Thêm mới danh mục";
        $listCategory = Category::all();
        $work = new Works($listCategory);
        $this->data['htmlSelect'] = $work->categoryRecusi(0);
        return view('backend.Category.add', $this->data);
    }

    public function storeCateogry(Request $request)
    {
        $categorty = new Category();

        $rule = [
            'name' => 'required|unique:categories|max:50|min:1',
            'decription' => 'required|max:500|min:10',
            'meta_title' => 'required|max:500|min:5',
            'meta_descrip' => 'required|max:500|min:5',
            'meta_keywords' => 'required|max:500|min:10'
        ];
        $request->validate($rule);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $ext;
            $file->move('assets/upload/category', $fileName);
            $categorty->image = $fileName;
        }
        $categorty->name = $request->name;
        $categorty->slug = Str::slug($request->name);
        $categorty->description = $request->decription;
        $categorty->status = $request->status ? '1' : 0;
        $categorty->popular = $request->popular ? '1' : 0;
        $categorty->meta_title = $request->meta_title;
        $categorty->meta_descrip = $request->meta_descrip;
        $categorty->meta_keywords = $request->meta_keywords;
        $categorty->save();
        return redirect()->route('admin.category.index');

    }

    public function editCategory($id)
    {

        $this->data['category'] = Category::find($id);
        if (empty($this->data["category"])) {
            return redirect()->route('admin.category.index');
        }
        $this->data['title'] = "Sửa danh mục " . $this->data["category"]->name;
        return view("backend.Category.edit", $this->data);
    }

    public function updateCategory(Request $request, $id)
    {
        $categorty = Category::find($id);
        $rule = [
            'name' => 'required|max:50|min:1|unique:categories,name,' . $id,
        ];
        if ($request->hasFile('image')) {
            $path = 'assets/upload/category/' . $categorty->image;
            if (File::exists($path)) {
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $ext;
            $file->move('assets/upload/category', $fileName);
            $categorty->image = $fileName;
        }
        $request->validate($rule);

        $categorty->name = $request->name;
        $categorty->slug = Str::slug($request->name);
        $categorty->description = $request->decription;
        $categorty->status = $request->status ? '1' : 0;
        $categorty->popular = $request->popular ? '1' : 0;
        $categorty->meta_title = $request->meta_title;
        $categorty->meta_descrip = $request->meta_descrip;
        $categorty->meta_keywords = $request->meta_keywords;
        $categorty->save();
        return redirect('admin/category')->with('msg', "update success category");
    }

    public function deleteCategory($id)
    {
        $categorty = Category::find($id);
        if ($categorty->image) {
            $path = 'assets/upload/category/' . $categorty->image;
            if (File::exists($path)) {
                File::delete($path);
            }
        }
        $categorty->delete();
        return redirect('admin/category')->with('msg', "delete success category");

    }
}
