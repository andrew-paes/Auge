using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Mvc;

namespace Auge.MVC.Areas.Administrativo.Controllers
{
    public class HomeController : Controller
    {
        // GET: Administrativo/Home
        public ActionResult Index()
        {
            return View();
        }

    }
}