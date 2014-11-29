//
// DO NOT EDIT THIS FILE, IT HAS BEEN GENERATED USING AndroidAnnotations.
//


package com.spektra.apps.views;

import android.content.res.Resources;
import android.os.Bundle;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import com.spektra.apps.R.string;

public final class SpektraListFragment_
    extends SpektraListFragment
{

    private View contentView_;

    private void init_(Bundle savedInstanceState) {
        Resources resources_ = getActivity().getResources();
        strCart = resources_.getString(string.order_belanja);
        strPayment = resources_.getString(string.order_pembayaran);
        strPurchase = resources_.getString(string.order_pembelian);
        strContact = resources_.getString(string.order_kontak);
        strFoto = resources_.getString(string.order_foto);
        strTenor = resources_.getString(string.order_tenor);
        strSummary = resources_.getString(string.order_ringkasan);
        strKtp = resources_.getString(string.order_ktp);
        strSketch = resources_.getString(string.order_denah);
        strCanvas = resources_.getString(string.order_canvas);
        strMember = resources_.getString(string.order_identitas);
        strCode = resources_.getString(string.order_kode);
    }

    @Override
    public void onCreate(Bundle savedInstanceState) {
        init_(savedInstanceState);
        super.onCreate(savedInstanceState);
    }

    private void afterSetContentView_() {
    }

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container, Bundle savedInstanceState) {
        contentView_ = super.onCreateView(inflater, container, savedInstanceState);
        return contentView_;
    }

    @Override
    public void onViewCreated(View view, Bundle savedInstanceState) {
        super.onViewCreated(view, savedInstanceState);
        afterSetContentView_();
    }

    public View findViewById(int id) {
        if (contentView_ == null) {
            return null;
        }
        return contentView_.findViewById(id);
    }

    public static SpektraListFragment_.FragmentBuilder_ builder() {
        return new SpektraListFragment_.FragmentBuilder_();
    }

    public static class FragmentBuilder_ {

        private Bundle args_;

        private FragmentBuilder_() {
            args_ = new Bundle();
        }

        public SpektraListFragment build() {
            SpektraListFragment_ fragment_ = new SpektraListFragment_();
            fragment_.setArguments(args_);
            return fragment_;
        }

    }

}
