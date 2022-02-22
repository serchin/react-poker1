<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App;

use Session;

class TestimonialsController extends Controller
{
    /**
     * Display Our Slider Page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonials = App\Testimonial::all();
        return view('Backend.testimonials')->with([
            'testimonials' => $testimonials,
        ]);
    }

    /**
     * Show Edit testimonial Form.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function editTestimonialForm($id)
    {
        $testimonial = App\Testimonial::find($id);
        return view('Backend.edit-testimonial')->with('testimonial', $testimonial);
    }

    /**
     * Update Testimonial
     *
     * @return \Illuminate\Http\Response
     */
    public function updateTestimonial(Request $request, $id)
    {
        $testimonial = App\Testimonial::find($id);
        $this->validate($request, [
                'name'=>'required|string|max:70',
                'position'=>'required|string|max:255',
                'feedback'=>'required|string',
                'image'=>'image',
            ]);
        if (!empty($request->file('image'))) {
            unlink('uploads/testimonials/' . $testimonial->image);
            $imageName = time() . $request->file('image')->getClientOriginalName();
            $request->image->move('uploads/testimonials/', $imageName);
            $testimonial->image = $imageName;
        }
        $testimonial->name = $request->name;
        $testimonial->position = $request->position;
        $testimonial->feedback = $request->feedback;
        $testimonial->save();
        Session::flash('success', 'Your testimonial has been updated successfully.');
        return redirect()->route('testimonialspage');
    }

    /**
     * Delete Testimonial.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteTestimonial($id)
    {
        $testimonial = App\Testimonial::find($id);
        unlink('uploads/testimonials/' . $testimonial->image);
        $testimonial->delete();
        Session::flash('success', 'Your testimonial Has been Deleted Successfully');
        return redirect()->route('testimonialspage');
    }

        /**
     * Add a newly Partner.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addTestimonial(Request $request)
    {

        $this->validate($request, [
            'name'=>'required|string|max:70',
                'position'=>'required|string|max:255',
                'feedback'=>'required|string',
                'image'=>'image',
        ]);

        if (!empty($request->image)) {
            $new_name = time() . $request->file('image')->getClientOriginalName();
            $request->image->move('uploads/testimonials/', $new_name);
            App\Testimonial::create([
            'name' => $request->name,
            'position' => $request->position,
            'feedback' => $request->feedback,
            'image' => $new_name,
            ]);
            Session::flash('success', 'Your New Testimonial Had Been Added Successfully.');
            return redirect()->route('testimonialspage');
        }
    }
}
