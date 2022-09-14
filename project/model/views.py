from django.shortcuts import render

# Create your views here.

def home(request):
    print("Ok, estamos en la vista home")
    context = {}
    return render(request, 'model/index.html',context)