<?php

namespace IbnZohr\ArchivesBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use IbnZohr\ArchivesBundle\Entity\Storing;
use IbnZohr\ArchivesBundle\Entity\Hospitalization;
use IbnZohr\ArchivesBundle\Entity\Exam;
use IbnZohr\ArchivesBundle\Entity\Consultation;
use IbnZohr\ArchivesBundle\Entity\Patient;
use IbnZohr\ArchivesBundle\Entity\Outgoing;
use IbnZohr\ArchivesBundle\Entity\Service;

class DefaultController extends Controller {

    public function indexAction() {
        $em = $this->getDoctrine()->getManager();
        $storings = $em->getRepository('IbnZohrArchivesBundle:Storing')->findAll();
        return $this->render('IbnZohrArchivesBundle:Base:index.html.twig', ['storings' => $storings]);
    }

    public function deleteAction(Request $request, $id) {
        $em = $this->getDoctrine()->getManager();
        $storing = $em->getRepository('IbnZohrArchivesBundle:Storing')->find($id);
        $em->remove($storing);
        $em->flush();
        $storings = $em->getRepository('IbnZohrArchivesBundle:Storing')->findAll();
        return $this->render('IbnZohrArchivesBundle:Base:index.html.twig', ['storings' => $storings]);
    }

//    public function patientFormAction() {
//        $em = $this->getDoctrine()->getManager();
//        $patient = $em->getRepository('IbnZohrArchivesBundle:Patient')->findAll();
//        return $this->render('IbnZohrArchivesBundle:Archives:patient.html.twig', ["patients" => $patient]);
//    }
//    public function patientAction(Request $request) {
//        $em = $this->getDoctrine()->getManager();
//        $first = $request->request->get("first");
//        $last = $request->request->get("last");
//        $age = $request->request->get("age");
//        $addresse = $request->request->get("addresse");
//
//        $patient = new Patient();
//
//        $patient->setfirstName($first);
//        $patient->setlastName($last);
//        $patient->setage($age);
//        $patient->setaddress($addresse);
//
//        $em->persist($patient);
//        $em->flush();
//
//        return $this->redirectToRoute('archives_list_form');
//    }

    public function addFormAction() {
        $em = $this->getDoctrine()->getManager();
        $services = $em->getRepository('IbnZohrArchivesBundle:Service')->findAll();
        return $this->render('IbnZohrArchivesBundle:Archives:add.html.twig', ["services" => $services]);
    }

    public function addAction(Request $request) {
        $em = $this->getDoctrine()->getManager();
        $type = $request->request->get("type");
        $serviceId = $request->request->get("service");
        $number = $request->request->get("number");
        $prenom = $request->request->get("prenom");
        $nom = $request->request->get("nom");
        $age = $request->request->get("age");
        $adresse = $request->request->get("adresse");
        $year = $request->request->get("year");
        $date = $request->request->get("date");
        $archiveDate = $request->request->get("archiveDate");


        $service = $em->getRepository('IbnZohrArchivesBundle:Service')->find($serviceId);

        $patient = new Patient();
        $patient->setfirstName($prenom);
        $patient->setlastName($nom);
        $patient->setage($age);
        $patient->setaddress($adresse);


        $storing = new Storing();

        if ($type == 'Hospitalisation') {
            $hospitalisation = new Hospitalization();
            $hospitalisation->setHospNumber($number);
            $hospitalisation->setPatient($patient);
            $hospitalisation->setHospYear($year);
            $hospitalisation->setService($service);
            $hospitalisation->setHospDate(new \Datetime($date));
            $em->persist($hospitalisation);
            $storing->setHospitalization($hospitalisation);
        } else if ($type == 'Consultation') {
            $consultation = new Consultation();
            $consultation->setConsNumber($number);
            $consultation->setPatient($patient);
            $consultation->setConsYear($year);
            $consultation->setService($service);
            $consultation->setConsDate(new \DateTime($date));
            $em->persist($consultation);
            $storing->setConsultation($consultation);
        } else {
            $exam = new Exam();
            $exam->setExamNumber($number);
            $exam->setPatient($patient);
            $exam->setExamYear($year);
            $exam->setService($service);
            $exam->setExamDate(new \DateTime($date));
            $em->persist($exam);
            $storing->setExam($exam);
        }
        $storing->setDate(new \Datetime());
        $storing->setType($type);
        $em->persist($storing);
//        $em->persist($patient);
        $em->flush();

        /* $archive = new Archive();

          $archive->setDate()
          $archive->setAdmission() */
        return $this->redirectToRoute('ibn_zohr_archives_homepage');
    }

    public function editFormAction(Request $request, $id) {
        $em = $this->getDoctrine()->getManager();
        $storing = $em->getRepository('IbnZohrArchivesBundle:Storing')->find($id);
        $services = $em->getRepository('IbnZohrArchivesBundle:Service')->findAll();
        if ($storing->getType() == "Hospitalisation") {
            return $this->render('IbnZohrArchivesBundle:Archives:editHospitalisation.html.twig', ['storing' => $storing, "services" => $services]);
        }
        if ($storing->getType() == "Consultation") {
            return $this->render('IbnZohrArchivesBundle:Archives:editConsultation.html.twig', ['storing' => $storing, "services" => $services]);
        }
        if ($storing->getType() == "Examen") {
            return $this->render('IbnZohrArchivesBundle:Archives:editExam.html.twig', ['storing' => $storing, "services" => $services]);
        }
    }

    public function editAction(Request $request, $id) {
        $em = $this->getDoctrine()->getManager();
        $storing = $em->getRepository('IbnZohrArchivesBundle:Storing')->find($id);
        $type = $request->request->get("type");
        $serviceId = $request->request->get("service");
        $number = $request->request->get("number");
        $prenom = $request->request->get("prenom");
        $nom = $request->request->get("nom");
        $age = $request->request->get("age");
        $adresse = $request->request->get("adresse");
        $year = $request->request->get("year");
        $date = $request->request->get("date");
        $archiveDate = $request->request->get("archiveDate");

        $service = $em->getRepository('IbnZohrArchivesBundle:Service')->find($serviceId);
        if ($type == 'Hospitalisation') {
            $hospitalisation = $storing->getHospitalization();
            $hospitalisation->setHospNumber($number);
            $hospitalisation->setHospYear($year);
            $hospitalisation->setService($service);
            $hospitalisation->setHospDate(new \Datetime($date));
            $patient = $hospitalisation->getPatient();
            $patient->setfirstName($prenom);
            $patient->setlastName($nom);
            $patient->setage($age);
            $patient->setaddress($adresse);
            $hospitalisation->setPatient($patient);
            $storing->setHospitalization($hospitalisation);
        } else if ($type == 'Consultation') {
            $consultation = $storing->getConsultation();
            $consultation->setConsNumber($number);
            $consultation->setConsYear($year);
            $consultation->setService($service);
            $consultation->setConsDate(new \DateTime($date));
            $patient = $consultation->getPatient();
            $patient->setfirstName($prenom);
            $patient->setlastName($nom);
            $patient->setage($age);
            $patient->setaddress($adresse);
            $consultation->setPatient($patient);
            $storing->setConsultation($consultation);
        } else {
            $exam = $storing->getExam();
            $exam->setExamNumber($number);
            $exam->setExamYear($year);
            $exam->setService($service);
            $exam->setExamDate(new \DateTime($date));
            $patient = $exam->getPatient();
            $patient->setfirstName($prenom);
            $patient->setlastName($nom);
            $patient->setage($age);
            $patient->setaddress($adresse);
            $exam->setPatient($patient);
            $storing->setExam($exam);
        }
        $storing->setDate(new \Datetime());
        $storing->setType($type);
        $em->persist($storing);
        $em->flush();

        return $this->redirectToRoute('ibn_zohr_archives_homepage');
    }

    public function sortiesAction(Request $request, $id) {
        $em = $this->getDoctrine()->getManager();
        $outgoing = $em->getRepository('IbnZohrArchivesBundle:Outgoing')->findBy(['storing' => $id]);

        return $this->render('IbnZohrArchivesBundle:Archives:sorties.html.twig', ['outgoings' => $outgoing, 'storing_id' => $id]);
    }

    public function addsortiesFormAction(Request $request, $id) {
        $em = $this->getDoctrine()->getManager();
        $services = $em->getRepository('IbnZohrArchivesBundle:Service')->findAll();
        return $this->render('IbnZohrArchivesBundle:Archives:addSorties.html.twig', ["services" => $services, 'storing_id' => $id]);
    }

    public function addSortiesAction(Request $request, $id) {
        $em = $this->getDoctrine()->getManager();

        $date = $request->request->get("date");
        $serviceId = $request->request->get("service");
        $demandeur = $request->request->get("demandeur");
        $observation = $request->request->get("observation");

        $service = $em->getRepository('IbnZohrArchivesBundle:Service')->findOneBy(['id' => $serviceId]);
        $storing = $em->getRepository('IbnZohrArchivesBundle:Storing')->findOneBy(['id' => $id]);

        $outgoing = new Outgoing();
        $outgoing->setObservation($observation);
        $outgoing->setOutDate(new \DateTime($date));
        $outgoing->setRequester($demandeur);
        $outgoing->setService($service);
        $outgoing->setStoring($storing);

        $em->persist($outgoing);
        $em->flush();

        return $this->redirectToRoute('archives_sorties_form', ['id' => $id]);
    }

    public function ServiceFormAction() {
        $em = $this->getDoctrine()->getManager();
        $service = $em->getRepository('IbnZohrArchivesBundle:Service')->findAll();
        return $this->render('IbnZohrArchivesBundle:Archives:Service.html.twig', ['services' => $service]);
    }

    public function addServiceFormAction(Request $request) {
        $em = $this->getDoctrine()->getManager();
        $service = $em->getRepository('IbnZohrArchivesBundle:Service')->findAll();
        return $this->render('IbnZohrArchivesBundle:Archives:addService.html.twig', ["services" => $service]);
    }

    public function addServiceAction(Request $request) {
        $em = $this->getDoctrine()->getManager();

        $services = $request->request->get("service");
        $description = $request->request->get("description");

        $service = new Service();
        $service->setName($services);
        $service->setDescription($description);

        $em->persist($service);
        $em->flush();

        return $this->redirectToRoute('archives_Service_form');
    }

    public function deleteServiceAction(Request $request, $id) {
        $em = $this->getDoctrine()->getManager();
        $service = $em->getRepository('IbnZohrArchivesBundle:Service')->find($id);
        $em->remove($service);
        $em->flush();
        $services = $em->getRepository('IbnZohrArchivesBundle:Service')->findAll();
        return $this->render('IbnZohrArchivesBundle:Archives:Service.html.twig', ['services' => $services]);
    }

}

//    public function listFormAction() {
//        $em = $this->getDoctrine()->getManager();
//        $patient = $em->getRepository('IbnZohrArchivesBundle:Patient')->findAll();
//        return $this->render('IbnZohrArchivesBundle:Base:list.html.twig', ['patient' => $patient]);
//    }
//    public function deletepatientAction(Request $request, $id) {
//        $em = $this->getDoctrine()->getManager();
//        $patients = $em->getRepository('IbnZohrArchivesBundle:Patient')->find($id);
//        $em->remove($patients);
//        $em->flush();
//        $patient = $em->getRepository('IbnZohrArchivesBundle:Patient')->findAll();
//        return $this->render('IbnZohrArchivesBundle:Base:list.html.twig', ['patient' => $patient]);
//    }
//    public function editPatientFormAction(Request $request, $id) {
//        $em = $this->getDoctrine()->getManager();
//        $patient = $em->getRepository('IbnZohrArchivesBundle:Patient')->find($id);
//        return $this->render('IbnZohrArchivesBundle:Archives:editPatient.html.twig', ['patient' => $patient]);
//    }
    
    